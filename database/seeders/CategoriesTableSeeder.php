<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 27,
                'name' => 'Laptops',
                'slug' => 'laptops',
                'description' => 'Systems for processing data',
                'created_at' => '2021-06-28 03:57:11',
                'updated_at' => '2021-06-28 03:57:11',
            ),
            1 => 
            array (
                'id' => 28,
                'name' => 'Printers',
                'slug' => 'printers',
                'description' => 'Making hard copies out of soft copies',
                'created_at' => '2021-06-28 03:57:11',
                'updated_at' => '2021-06-28 03:57:11',
            ),
        ));
        
        
    }
}