<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function get(Request $req)
    {
        $categories = Category::with('goods')
                    ->get()
                    ->toArray();
   
        return view('category.list',compact('categories'));
    }

    // public function show()
    // {
    //     return view('category.list');
    // }
}
