<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class NewsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        $data[] = [
            'name' => 'Новини siemens',
            'slug' => 'siemens-news',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        $data[] = [
            'name' => 'Галузеві рішення',
            'slug' => 'industry-solutions',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];


        DB::table('news_categories')->insert($data);
    }
}
