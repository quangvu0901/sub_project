<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Notifications\InvoicePaid;

class OrderController extends Controller
{
    public function __construct()
    {
        Auth::setDefaultDriver('api');
    }
    public function orderProduct(Request $request)
    {
        dd(1);
        DB::beginTransaction();
        try {
            $user_id = auth()->user()->id;
            $total_price = $request['total_price'];
            $order = new Order();
            $order['user_id'] = $user_id;
            $order['total_price'] = $total_price;
            $order['status'] = 1;
            $order->save();

            $shipping = new Shipping();
            $shipping['order_id'] = $order->id;
            $shipping['name'] = $request->name;
            $shipping['phone'] = $request->phone;
            $shipping['address'] = $request->address;
            $shipping->save();

            $object = $request->obj;

            foreach ($object as $obj) {
                $products = Product::find($obj['product_id']);
                $quantity = $products->quantity - $obj['quantity'];
                DB::table('order_details')->insert([
                    'order_id' => $order->id,
                    'product_id' => $obj['product_id'],
                    'quantity' => $obj['quantity'],
                    'product_name' => $products->name,
                    'product_price' => $obj['price']
                ]);
                $products->update([
                    'quantity' => $quantity,
                ]);
            }

            $user = auth()->user();
            $user->notify(new InvoicePaid());

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 'Error',
                'message' => 'False payment',

            ]);;
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully payment',
        ]);
    }

    public function sendMail()
    {
        $user = auth()->user();
        $user->notify(new InvoicePaid());


        return response()->json([
            'status' => 'success',
            'message' => 'Successfully order',
        ]);
    }

    public function bought()
    {
        $order = auth()->user()->orders;
        
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully',
            'orders' => $order
        ]);
    }


    public function show($id)
    {
        $user_id = auth()->user()->id;
        $orders = Order::with('oderDetail', 'shipping')->where('user_id', $user_id)->find($id);

        return response()->json([
            'order' => $orders
        ]);
    }
}
