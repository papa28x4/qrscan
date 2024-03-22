<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(DepartmentsTableSeeder::class);
        // $this->call(CategoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        // $this->call(ProductsTableSeeder::class);
        // $this->call(ProductImagesTableSeeder::class);
        // $this->call(ItemsTableSeeder::class);
        
    }
}
