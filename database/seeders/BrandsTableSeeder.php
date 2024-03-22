<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('brands')->delete();
        
        \DB::table('brands')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'HP',
                'slug' => 'hp',
                'created_at' => '2021-06-24 10:34:17',
                'updated_at' => '2021-06-24 16:23:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'DELL',
                'slug' => 'dell',
                'created_at' => '2021-06-24 10:35:25',
                'updated_at' => '2021-06-24 10:35:25',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'ASUS',
                'slug' => 'asus',
                'created_at' => '2021-06-24 10:54:25',
                'updated_at' => '2021-06-24 10:54:25',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'ACER',
                'slug' => 'acer',
                'created_at' => '2021-06-24 10:34:17',
                'updated_at' => '2021-06-24 16:23:48',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'LENOVO',
                'slug' => 'lenovo',
                'created_at' => '2021-06-24 10:35:25',
                'updated_at' => '2021-06-24 10:35:25',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'IBM',
                'slug' => 'ibm',
                'created_at' => '2021-06-24 10:54:25',
                'updated_at' => '2021-06-24 10:54:25',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'APPLE',
                'slug' => 'apple',
                'created_at' => '2021-06-24 10:34:17',
                'updated_at' => '2021-06-24 16:23:48',
            )
        ));
        
    }
}
