<?php

namespace App\Actions\Goods;

use App\Models\Goods;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Create
{
    public function __invoke(Request $request)
    {
        if(!isset($request->goodId))
            $good = new Goods;
        else
            $good = Goods::find($request->goodId);
        $good->name = $request->name;
        $good->price = $request->price;
        $good->count = $request->count;
        $good->description = $request->description;
        $good->category_id = $request->category_id;
        $good->save();
    }
}