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
        $product_id = array_values(array_unique(array_column($object,'product_id')));
        $products = Product::whereIn('id', $product_id)->select('id','price','name')->get();
        foreach($object as $obj){
            foreach($products as $product){
                if($obj['product_id'] == $product->id){
                    echo 1111;
                    $a[] = [
                        'order_id' => $order->id,
                        'product_id' => $obj['product_id'],
                        'quantity' => $obj['quantity'],
                        'product_name' => $product->name,
                        'product_price' => $product->price
                    ];
                }
            }
        }
        DB::table('order_details')->insert($a);

        
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully payment',
        ]);
    }
}
