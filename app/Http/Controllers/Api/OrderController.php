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
//        $this->middleware('auth:api', ['except' => ['login','register']]);
        Auth::setDefaultDriver('api');
    }
    public function orderProduct(Request $request){
        $user_id = auth()->user()->id;
        $total_price = $request['total_price'];
        $order = new Order();
        $order['user_id'] = $user_id;
        $order['total_price'] = $total_price;
        $order['status'] = 1;
        $order->save();

        $object = $request->obj;
        foreach($object as $obj){
            $products = Product::find($obj['product_id']);
            DB::table('order_details')->insert([
                'order_id' => $order->id,
                'product_id' => $obj['product_id'],
                'quantity' => $obj['quantity'],
                'product_name' => $products->name,
                'product_price' => $products->price 
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully payment',
        ]);
    }
}
