<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_images')->delete();
        
        \DB::table('product_images')->insert(array (
            0 => 
            array (
                'id' => 2,
                'images' => '[{"id":1,"src":"products\\/1642771921-119926_1637162000.jpg"},{"id":2,"src":"products\\/1642771923-119926_1637162008.jpg"},{"id":3,"src":"products\\/1642771923-119926_1638161962.jpg"}]',
                'product_id' => 2,
                'created_at' => '2022-01-21 13:32:03',
                'updated_at' => '2022-01-21 13:32:03',
            ),
            1 => 
            array (
                'id' => 3,
                'images' => '[{"id":1,"src":"products\\/1642775446-118566_1632310209.jpg"},{"id":2,"src":"products\\/1642775447-118566_1632310204.jpg"},{"id":3,"src":"products\\/1642775447-118566_1632310214.jpg"}]',
                'product_id' => 3,
                'created_at' => '2022-01-21 14:30:48',
                'updated_at' => '2022-01-21 14:30:48',
            ),
            2 => 
            array (
                'id' => 4,
                'images' => '[{"id":1,"src":"products\\/1642775682-118566_1629103267.jpg"},{"id":2,"src":"products\\/1642775683-118566_1629103282.jpg"}]',
                'product_id' => 4,
                'created_at' => '2022-01-21 14:34:43',
                'updated_at' => '2022-01-21 16:13:43',
            ),
            3 => 
            array (
                'id' => 5,
                'images' => '[{"id":1,"src":"products\\/1642776021-190539_1625944667.jpg"},{"id":2,"src":"products\\/1642776024-190539_1625944727.jpg"},{"id":3,"src":"products\\/1642776025-190539_1625944747.jpg"}]',
                'product_id' => 5,
                'created_at' => '2022-01-21 14:40:25',
                'updated_at' => '2022-01-21 14:40:25',
            ),
            4 => 
            array (
                'id' => 6,
                'images' => '[{"id":1,"src":"products\\/1642776260-154801_1633534915.jpg"},{"id":2,"src":"products\\/1642776261-154801_1633534945.jpg"}]',
                'product_id' => 6,
                'created_at' => '2022-01-21 14:44:21',
                'updated_at' => '2022-01-21 14:44:21',
            ),
        ));
        
        
    }
}