<?php

namespace App\Http\Controllers\Api;

use App\Constants\Params;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $categories = Category::all();
        $products = Product::search()->paginate(Params::LIMIT_SHOW);

        return response()->json($products);
    }
}
