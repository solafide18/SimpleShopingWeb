<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        DB::table('categories')->insert( [
            [
                'name'  =>'baju', 
                'title' =>'baju', 
                'slug'  =>'baju',
                'uppper_category_id'    =>0
            ],
            [
                'name'  =>'celana', 
                'title' =>'celana', 
                'slug'  =>'celana',
                'uppper_category_id'    =>0
            ],
            [
                'name'  =>'sepatu', 
                'title' =>'sepatu', 
                'slug'  =>'sepatu',
                'uppper_category_id'    =>0
            ]
        ]);
    }
}
