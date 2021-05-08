<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();

        for ($i = 1; $i <= 36; $i++)
        {
            DB::table('products')->insert( [
                [
                    'name'  =>'product '.$i, 
                    'price' =>rand(1, 50) . "000", 
                    'stock'  =>10,
                    'category_id'   => 0,
                    'path_image'    =>'template/images/pic' .rand(1, 13) . '.jpg'
                ]
            ]);
        }
    }
}
