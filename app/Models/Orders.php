<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Goods;

class Orders extends Model
{
    protected $fillable = ['id','address','comment','user_id','goods_id','description','status','price','quantity','total_price','user_name'];
    protected $hidden = ['created_at','updated_at'];
    protected $table = 'orders';
    public function goods()
    {
        return $this->belongsTo(Goods::class);
    }
}
