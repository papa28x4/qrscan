<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('items')->delete();
        
        \DB::table('items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'serial_no' => '775676868568596',
                'user_id' => 30,
                'product_id' => 3,
                'color' => 'Black',
                'qr_code' => 'uploads/qrcodes/775676868568596.png',
                'created_at' => '2022-01-21 16:28:56',
                'updated_at' => '2022-01-21 16:28:56',
            ),
            1 => 
            array (
                'id' => 2,
                'serial_no' => '87644342223466778996',
                'user_id' => 31,
                'product_id' => 4,
                'color' => 'Black',
                'qr_code' => 'uploads/qrcodes/87644342223466778996.png',
                'created_at' => '2022-01-22 08:20:03',
                'updated_at' => '2022-01-22 08:20:03',
            ),
            2 => 
            array (
                'id' => 6,
                'serial_no' => 'A-675654454545343',
                'user_id' => 23,
                'product_id' => 6,
                'color' => 'Grey',
                'qr_code' => 'uploads/qrcodes/A-675654454545343.png',
                'created_at' => '2022-01-22 10:40:19',
                'updated_at' => '2022-01-22 10:40:19',
            ),
            3 => 
            array (
                'id' => 7,
                'serial_no' => 'P-9875A4542890754',
                'user_id' => 29,
                'product_id' => 2,
                'color' => 'Black',
                'qr_code' => 'uploads/qrcodes/P-9875A4542890754.png',
                'created_at' => '2022-01-22 10:40:52',
                'updated_at' => '2022-01-22 10:40:52',
            ),
            4 => 
            array (
                'id' => 8,
                'serial_no' => 'SN677667675875432',
                'user_id' => 22,
                'product_id' => 5,
                'color' => 'Black',
                'qr_code' => 'uploads/qrcodes/SN677667675875432.png',
                'created_at' => '2022-01-22 10:41:18',
                'updated_at' => '2022-01-22 10:41:18',
            ),
        ));
        
        
    }
}