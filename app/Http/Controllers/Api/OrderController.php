<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
        Auth::setDefaultDriver('api');
    }
    public function orderProduct(Request $request)
    {
        DB::beginTransaction();
        try {
            $user_id = auth()->user()->id;
            $total_price = $request['total_price'];
            $order = new Order();
            $order['user_id'] = $user_id;
            $order['total_price'] = $total_price;
            $order['status'] = 1;
            $order->save();

            $object = $request->obj;

            foreach ($object as $obj) {
                $products = Product::find($obj['product_id']);
                $quantity = $products->quantity - $obj['quantity'];
                DB::table('order_details')->insert([
                    'order_id' => $order->id,
                    'product_id' => $obj['product_id'],
                    'quantity' => $obj['quantity'],
                    'product_name' => $products->name,
                    'product_price' => $products->price
                ]);
                $products->update([
                    'quantity' => $quantity,
                ]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->response()->json([
                'status' => 'Error',
                'message' => 'False payment',
            ]);;
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully payment',
        ]);
    }
}
