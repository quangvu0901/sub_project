<?php

namespace App\Http\Controllers\Api;

use App\Constants\Params;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::search()->paginate(Params::LIMIT_SHOW);

        return response()->json($categories);
    }
}
