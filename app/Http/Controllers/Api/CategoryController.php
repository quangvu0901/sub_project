<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::search()->paginate(Params::LIMIT_SHOW);

        return response()->json($categories);
    }
}