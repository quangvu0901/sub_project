<?php

namespace App\Http\Controllers\Api;

use App\Constants\Params;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::search()->paginate(Params::LIMIT_SHOW);

        return response()->json($products);
    }

    function search($name)
    {
        $result = Product::where('name', 'LIKE', '%'. $name. '%')->paginate(Params::LIMIT_SHOW);
        if(count($result)){
            return Response()->json($result);
        }
        else
        {
            return response()->json(['Result' => 'No Data not found'], 404);
        }
    }

}
