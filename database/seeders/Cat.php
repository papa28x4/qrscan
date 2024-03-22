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
                'id' => 26,
                'name' => 'All',
                'slug' => 'all',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, voluptatum.',
                'created_at' => '2021-02-10 03:57:11',
                'updated_at' => '2021-02-10 03:57:11',
            ),
            1 => 
            array (
                'id' => 27,
                'name' => 'Laptops',
                'slug' => 'laptops',
                'description' => 'Systems for processing data',
                'created_at' => '2021-06-28 03:57:11',
                'updated_at' => '2021-06-28 03:57:11',
            ),
            2 => 
            array (
                'id' => 28,
                'name' => 'Printers',
                'slug' => 'printers',
                'description' => 'Making hard copies out of soft copies',
                'created_at' => '2021-06-28 03:57:11',
                'updated_at' => '2021-06-28 03:57:11',
            ),
            3 => 
            array (
                'id' => 29,
                'name' => 'General',
                'slug' => 'general',
                'description' => "Any item that's not a printer or laptop",
                'created_at' => '2021-06-28 03:57:11',
                'updated_at' => '2021-06-28 03:57:11',
            )
        ));
        
        
    }
}