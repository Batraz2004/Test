<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Goods;
class GoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    private $heavyNames = ['шоколад','картошка','банан'];
    private $fragileNames = ['ваза','стакан','тарелка'];
    private $lowWeightNames = ['яблоко','груша','апельсин'];
    
    public function run(): void
    {
        $categories = [$this->heavyNames, $this->fragileNames, $this->lowWeightNames];

        foreach($categories as $key => $item)
        {
           foreach($item as $product)
            Goods::create([
                'name'=>$product, 
                'category_id'=>$key+1,
                'count'=> rand(1,10),
                'description'=>'описание',
                'price' => round((rand(100,700)/10),2),          
            ]);
        }
    }
}
