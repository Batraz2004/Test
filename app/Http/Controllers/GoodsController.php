<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;

class GoodsController extends Controller
{
    public function goodsEditShow()
    {
        return view("goods.editForm");
    }

    public function goodsEdit(Request $request)
    {
        $good = new Goods;
        $good->name = $request->name;
        $good->price = $request->price;
        $good->count = $request->count;
        $good->description = $request->description;
        $good->category_id = $request->category_id;
        $good->save();
        return redirect()->route('category');
    }
}
