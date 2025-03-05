<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Goods;
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
        $good->description = $request->decription;
        return view("category");
    }
}
