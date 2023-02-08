<?php

namespace App\Http\Controllers\Api;

use App\Constants\Params;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProductWithOneImg()
    {
        $products = Product::with('image')->paginate(Params::LIMIT_SHOW);

        return response()->json([
            'product' => $products,
        ]);
    }

    public function getProductWithAllImg(Request $request)
    {
        $param = $request->input('keyword');
        $products = Product::with('images')->paginate(Params::LIMIT_SHOW);

        return response()->json([
            'product' => $products,
        ]);
    }

    function search(Request $request)
    {
        $param = $request->input('keyword');
        $result = Product::with('image')->filter()->paginate($request->limit);
        
        if (count($result)) {
            return Response()->json($result);
        } else {
            return response()->json(['Result' => 'No Data not found'], 404);
        }
    }

    public function show($id)
    {
        $products = Product::with('images')->find($id);

        return  Response()->json($products);
    }
}
