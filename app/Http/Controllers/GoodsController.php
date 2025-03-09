<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Actions\Goods\Create;
use App\Actions\Goods\GetDetail;
use App\Actions\Goods\Delete;


class GoodsController extends Controller
{
    public function goodsCreateShow()
    {
        return view("goods.createForm");
    }

    public function goodsCreate(Request $request)
    {
        $goodCreate = new Create;
        $goodCreate($request);
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
                $goodDetail = new GetDetail;
                $good = $goodDetail($request);
                return view("goods.detail",compact('good'));
                break;
            case "edit-id":
                return view("goods.createForm",["goodId" => $goodId]);
                break;
            case "delete-id":
                $goodDel = new Delete;
                $goodDel($goodId);
                return redirect()->route('category');
                break;
            default:
                return redirect()->route('category');
                break;
        }
    }

}
