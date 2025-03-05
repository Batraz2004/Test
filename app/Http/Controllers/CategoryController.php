<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function get(Request $req)
    {
        $categories = Category::with('goods')->get();
        return response()->json(['data'=>$categories],200);
    }
}
