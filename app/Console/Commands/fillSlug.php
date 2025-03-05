<?php

namespace App\Console\Commands;
use App\Helpers\SlugHelper;

use Illuminate\Console\Command;

class fillSlug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fill-slug-category';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        SlugHelper::addedSlugToCategory();
        SlugHelper::addedSlugToGoods();

        //
    }
}
