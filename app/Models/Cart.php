<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['id','user_id','name','description','goods_id','price','quantity','total_price'];
    protected $table = "cart";
    protected $hidden = ['updated_at','created_at'];

    public function good()
    {
        return $this->belongsTo(Goods::class);
    }
}
