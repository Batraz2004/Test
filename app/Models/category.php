<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'category';
    protected $fillable = ['id','name','slug','description','sort'];
    protected $hidden = ['updated_at','created_at'];

    public function goods()
    {
        return $this->hasMany(goods::class);
    }
}
