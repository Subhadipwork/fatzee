<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
         $items = Category::latest()->paginate(30);
        // $categories = Category::all();

        return view('admin.category.list', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.category');
    }




    public function store(Request $request)
    {
        try {

            $validatedData = $request->validate([
                'category_name' => 'required|unique:categories',
                'image' => 'required',
            ]);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = 'sub_cate' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/category'), $filename);
                $validatedData['image'] = $filename;
            }

            $category = Category::create([
                'category_name' => $validatedData['category_name'],
                'image' => $filename
            ]);
            return redirect()->back()->with('success', 'Category created successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.category.list');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);

        // dd($category);

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'slug' => 'required|unique:categories,slug,' . $category->id,
            'image' => 'required',
        ]);

        $category->name = $validatedData['name'];
        $category->slug = $validatedData['slug'];
        $category->save();
        return response()->json(['message' => 'Category Updated successfully!', 'category' => $category]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
    
            return response()->json(['status' =>'success', 'message' => 'Category deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error','message' => $e->getMessage()], 500);
        }
    }
    public function updateStatus(Request $request)
    {

        $request->validate([
            'id' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        $category = Category::find($request->id);
        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Category not found!'
            ], 404);
        }
        if ($request->type == 'status') {
            $category->status = !$category->status;
        } elseif ($request->type == 'top_category') {
            $category->top_category = $category->top_category === '1' ? '0' : '1';
        }

        $category->save();


        return response()->json(
            [
                'status' => true,
                'message' => 'Status updated successfully!',
            ]
        );
    }
}
