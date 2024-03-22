<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Department;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('departments')->delete();
        
        \DB::table('departments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Finance',
                'slug' => SlugService::createSlug(Department::class, 'slug', 'Finance'),
                'created_at' => '2021-06-24 10:34:17',
                'updated_at' => '2021-06-24 16:23:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Information System',
                'slug' => SlugService::createSlug(Department::class, 'slug', 'Information System'),
                'created_at' => '2021-06-24 10:35:25',
                'updated_at' => '2021-06-24 10:35:25',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Sales',
                'slug' => SlugService::createSlug(Department::class, 'slug', 'Sales'),
                'created_at' => '2021-06-24 10:54:25',
                'updated_at' => '2021-06-24 10:54:25',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Projects',
                'slug' => SlugService::createSlug(Department::class, 'slug', 'Projects'),
                'created_at' => '2021-06-24 10:34:17',
                'updated_at' => '2021-06-24 16:23:48',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Marketing',
                'slug' => SlugService::createSlug(Department::class, 'slug', 'Marketing'),
                'created_at' => '2021-06-24 10:35:25',
                'updated_at' => '2021-06-24 10:35:25',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Quality Assurance',
                'slug' => SlugService::createSlug(Department::class, 'slug', 'Quality Assurance'),
                'created_at' => '2021-06-24 10:54:25',
                'updated_at' => '2021-06-24 10:54:25',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Customer Service',
                'slug' => SlugService::createSlug(Department::class, 'slug', 'Customer Service'),
                'created_at' => '2021-06-24 10:34:17',
                'updated_at' => '2021-06-24 16:23:48',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Logistics',
                'slug' => SlugService::createSlug(Department::class, 'slug', 'Logistics'),
                'created_at' => '2021-06-24 10:54:25',
                'updated_at' => '2021-06-24 10:54:25',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Human Resources',
                'slug' => SlugService::createSlug(Department::class, 'slug', 'Human Resources'),
                'created_at' => '2021-06-24 10:34:17',
                'updated_at' => '2021-06-24 16:23:48',
            )
        ));
    }
}
