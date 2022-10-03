<?php

namespace Database\Seeders;

use App\Models\Topicality;
use Database\Factories\TopicalityFactory;
use Illuminate\Database\Seeder;

class TopicalityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Topicality::factory()->count(30)->create();
    }
}
