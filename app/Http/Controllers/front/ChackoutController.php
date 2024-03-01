<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\AddCart as Cart;
use App\Models\OrderList;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


class ChackoutController extends Controller
{
    public function addCart(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'status' => false,
                'message' => 'Please login first'
            ]);
        }

        $product = Product::find($request->id);

        if ($product == null) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found'
            ]);
        }
        if (Cart::where('user_id', Auth::user()->id)->where('product_id', $request->id)->exists()) {

            return response()->json([
                'status' => false,
                'message' => 'Product already added to cart'
            ]);
        }

        Cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
            'quantity' => 1,
            'price' => $product->price
        ]);


        return response()->json([
            'status' => true,
            'message' => 'Product added to cart'
        ]);
    }

    public function chackout(Request $request)
    {

        $request->validate([
            'type' => 'required'
        ]);

        $userdata = User::with('userAddress')->find(Auth::user()->id);
        $chackout_data = [
            'user_data' => $userdata,
            'type' => $request->type,
            'special_instruction' => $request->special_instruction
        ];
        return view('frontend.chackout.index', compact('chackout_data'));
    }




    public function store(Request $request)
    {

        $cartItems = Cart::where('user_id', Auth::user()->id)->get();

        $orderData = [
            'user_id' => Auth::user()->id,
            'invoice_no' => $this->generateInvoiceNumber(),
            'payment_method' => 'Cash',
            'delivery_charge' => 5,
            'delivery_type' => $request->type,
            'special_instruction' => $request->special_instruction,
            'grandtotal' => usercartprice() + 5,
            'subtotal' => usercartprice(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'state' => $request->state,
            'city' => $request->city,
            'pincode' => $request->pincode,
            'country' => 'India',
            'status' => 'placed',
            'created_at' => now(),
            'order_date' => now()
        ];

        DB::beginTransaction();

        try {
            $order = OrderList::create($orderData);

            $orderProductData = $cartItems->map(function ($item) use ($order) {
                return [
                    'order_id' => $order->id,
                    'invoice_no' => $order->invoice_no,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'product_price' => $item->price,
                    'total_price' => $item->price * $item->quantity
                ];
            })->toArray();

            OrderProduct::insert($orderProductData);

            // Cart::where('user_id', Auth::user()->id)->delete();

            DB::commit();

            if ($request->type == 'delivery') {
                $data = [
                    'order_id' => $order->id,
                    'invoice_no' => $order->invoice_no,
                ];
               return $this->firebase($data);
            }

            return redirect()->route('home')->with('success', 'Order Placed Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }


    private function generateInvoiceNumber()
    {
        $prefix = 'Fat-';
        $date = Carbon::now()->format('Ymd');
        $lastorder = OrderList::latest()->first();
        if ($lastorder) {
            $number = $lastorder->id + 1;
        } else {
            $number = 1;
        }


        return $prefix . $date . str_pad($number, 5, '0', STR_PAD_LEFT);
    }

    
    private function firebase($data)
    {
        try {
            $firebase = (new Factory)
                ->withServiceAccount(__DIR__ . '/eating-c35a8-firebase-adminsdk-erjlj-13ed537f08.json')
                ->withDatabaseUri('https://eating-c35a8-default-rtdb.firebaseio.com/');
            $database = $firebase->createDatabase();
            $orderdata = OrderList::where('id', $data['order_id'])->first();

            $order_id = $orderdata->invoice_no;
            $checkout_total = $orderdata->grandtotal;
            $chicago_date = Carbon::now('America/Chicago')->format('Y-m-d H:i:s');
            $deliveryInstructions = $orderdata->special_instruction;
            $orderPlaceDate = Carbon::parse($orderdata->order_date)->format('Y-m-d H:i:s');
            $delivery_fee = 5;
            $deliveryTime = Carbon::parse($orderdata->order_date)->format('H:i');
            $deliveryTimeNew = Carbon::parse($orderdata->order_date)->addMinutes(15)->format('H:i');
            $resturent_area = '';
            $phone_no = $orderdata->phone;
            $shortingDate = Carbon::parse($orderdata->order_date)->format('Y-m-d');
            $restaurent_name = 'Fatzy';
            $restaurantPhone = '';
            $tips = '';
            $address1 = $orderdata->address;
            $user_name = Auth::user()->name;
            $pre_time = Carbon::parse($orderdata->order_date)->format('H:i');
    
            $newPost = $database
                ->getReference('order_list/' . $order_id)
                ->set([
                    'order_id' => $order_id,
                    'checkout_total' => $checkout_total,
                    'chicago_date' => $chicago_date,
                    'city' => '',
                    'del_instruction' => $deliveryInstructions,
                    'delivery_date' => $orderPlaceDate,
                    'delivery_fee' => $delivery_fee,
                    'delivery_time' => $deliveryTime,
                    'dispatcher_id' => '',
                    'drinks' => '',
                    'driver_id' => '',
                    'f_ready_time' => $deliveryTimeNew,
                    'food_ready_status' => '',
                    'landmark' => $resturent_area,
                    'order_type' => '',
                    'phone_no' => $phone_no,
                    'pin_to_top' => '0',
                    'priority' => '5',
                    'restaurant_name' => $restaurent_name,
                    'restaurant_phone' => $restaurantPhone,
                    'sortStatus' => 'Incomplete',
                    'sortTime' => $shortingDate,
                    'status' => 'Unassign',
                    'tips' => $tips,
                    'unit' => '',
                    'user_address' => $address1,
                    'user_name' => $user_name,
                    'waiting_status' => '',
                    'pre_time' => $pre_time,
                    'order_by' => 'Mail'
                ]);
    
            return 'Firebase data added successfully';
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    
}
