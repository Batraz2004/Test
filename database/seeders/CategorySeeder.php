<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $data=[['name'=>'тяжелый','slug'=>'tegeli','description'=>'тяжелые продукты','sort'=>11],
                    ['name'=>'хрупкий','slug'=>'hrupki','description'=>'хрупкие продукты','sort'=>11],
                    ['name'=>'легкий','slug'=>'legki','description'=>'легкие продукты','sort'=>11],];

    public function run(): void
    {
        foreach($this->data as $item)
            Category::create($item);
    }
}
