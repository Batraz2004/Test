<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class GoodsController extends Controller
{
    public function goodsCreateShow()
    {
        return view("goods.createForm");
    }

    public function goodsCreate(Request $request)
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

        return redirect()->route('category');
    }

    public function goodsEditShow()
    {
        return view("goods.editForm");
    }

    public function goodsEdit(Request $request)
    {
        $goodId = $request->goodsId;

        switch($request->submit)
        {
            case "detail-id":
                $good = Goods::find($goodId)->toArray();
                return view("goods.detail",compact('good'));
                    break;
            case "edit-id":
                return view("goods.createForm",["goodId" => $goodId]);
                break;
            case "delete-id":
                $good = Goods::where('id',$goodId)->delete();
                return redirect()->route('category');
                break;
            default:
                return redirect()->route('category');
                break;
        }
    }

}
