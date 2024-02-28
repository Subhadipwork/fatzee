<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        // Remove existing cache (optional)
        $removeCache = Cache::forget('paginated_products');
       
        if (Cache::has('paginated_products')) {
            $items = Cache::get('paginated_products');
        } else {
            $items = Product::with('adminproductimage', 'category')->paginate(10); 
            Cache::forever('paginated_products', $items);
        }
        return view('admin.product.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.product.createproduct', compact('categories'));
    }

public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'product_code' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $product = Product::create($validatedData);

        $images = $request->file('image');
        foreach ($images as $image) {
            $extension = $image->getClientOriginalExtension();
            $createname = $product->id . '_' . uniqid() . '.' . $extension;
            $image->move(public_path('uploads/products'), $createname);
            ProductImage::create([
                'product_id' => $product->id,
                'image' => $createname
            ]);
        }

        $productcashe = Cache::forget('product');
        if ($productcashe) {
            return redirect()->back()->with('success', 'Product created successfully');       
        }
        return redirect()->back()->with('success', 'Product created successfully');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error creating product: ' . $e->getMessage());
    }
}



    public function updateStatus(Request $request)
    {
        $product = Product::find($request->product_id);
        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found!'
            ], 404);
        }
        if ($request->type == 'is_featured') {

            $product->featured = $product->status == '1' ? '0' : '1';
        } elseif ($request->type == 'status') {
            $product->status = $product->status == '1' ? '0' : '1';
        }
        //    return $product;
        $product->save();
        return response()->json([
            'status' => true,
            'message' => 'Product Status Changed'
        ]);
    }

    public function destroy($id)
    {

        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found!'
            ], 404);
        }
        $product->delete();
        return response()->json([
            'status' => true,
            'message' => 'Product Deleted'
        ]);
    }


    public function edit($id)
    {

        $product = Product::with('productimage')->find($id);

        if (!$product) {
            return  redirect()->back()->with('error', 'Product not found!');
        }
        return view('admin.product.edit', compact('product', 'categories'));
    }


    public function update(Request $request, $id)
    {

        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }
        $validatedData = $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'product_code' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        $product->update($validatedData);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $extension = $image->getClientOriginalExtension();
                $createname = $product->id . '_' . uniqid() . '.' . $extension;
                $imagePath = $image->move(public_path('uploads/products'), $createname);
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $createname
                ]);
            }
        }
    }


    public function removeimage($id)
    {
        $image = ProductImage::find($id);
        if (!$image) {
            return response()->json([
                'status' => false,
                'message' => 'Image not found!'
            ], 404);
        }
        $imagepath = public_path('uploads/products/' . $image->image);
        $unlink = @unlink($imagepath);

        $image->delete();
        return response()->json([
            'status' => true,
            'message' => 'Image Deleted'
        ]);
    }
}
