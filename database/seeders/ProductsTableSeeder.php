<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'HP 15-dw1250nia',
                'slug' => 'hp-15-dw1250nia',
                'code' => '5529617',
                'description' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio',
                'brand_id' => 1,
                'cost' => 470000.0,
                'category_id' => 27,
                'user_id' => 22,
                'basic_details' => '{"processor":"Intel Core I7","memory":"16GB","storage":"1TB","os":"Windows 10","screen":"15.6\\" HD LED TOUCHSCREEN","wireless":"Bluetooth, Wifi"}',
                'created_at' => '2022-01-21 13:32:01',
                'updated_at' => '2022-01-21 13:32:01',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Asus Zenbook 14 UX425EA-KI459T',
                'slug' => 'asus-zenbook-14-ux425ea-ki459t',
                'code' => '5442294',
                'description' => 'Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat',
                'brand_id' => 3,
                'cost' => 547500.0,
                'category_id' => 27,
                'user_id' => 22,
                'basic_details' => '{"processor":"Intel Core I7","memory":"8GB","storage":"512GB SSD","os":"Windows 10","screen":"14\\" 1920 x 1080","wireless":"Bluetooth, Wifi"}',
                'created_at' => '2022-01-21 14:30:46',
                'updated_at' => '2022-01-21 14:30:46',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Lenovo S145-15IGM',
                'slug' => 'lenovo-s145-15igm',
                'code' => '5380714',
                'description' => 'I had checkout some other open source webcam JS libraries, and find some works on desktop but not on mobile, some works only on front camera but not on rear camera, some is not mirroring the webcam.',
                'brand_id' => 5,
                'cost' => 155000.0,
                'category_id' => 27,
                'user_id' => 22,
                'basic_details' => '{"processor":"Intel Celeron","memory":"4GB","storage":"1TB","os":"Linux","screen":"15.6inch 1366 x 768","wireless":"Bluetooth, Wifi"}',
                'created_at' => '2022-01-21 14:34:42',
                'updated_at' => '2022-01-21 16:13:43',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Dell Xps 13',
                'slug' => 'dell-xps-13',
                'code' => '5343498',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
                'brand_id' => 2,
                'cost' => 495000.0,
                'category_id' => 27,
                'user_id' => 22,
                'basic_details' => '{"processor":"\\u00a0Intel Core I5","memory":"8GB","storage":"512GB SSD","os":"Windows 10","screen":"13.3\\" 1920 X 1080 TOUCH SCREEN","wireless":"Bluetooth, Wifi"}',
                'created_at' => '2022-01-21 14:40:21',
                'updated_at' => '2022-01-21 14:40:21',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'Apple Macbook Air 13',
                'slug' => 'apple-macbook-air-13',
                'code' => '5463761',
                'description' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum',
                'brand_id' => 7,
                'cost' => 760000.0,
                'category_id' => 27,
                'user_id' => 22,
                'basic_details' => '{"processor":"M1 - Chip","memory":"8GB","storage":"512GB SSD","os":"Mac os","screen":"13.3\\"","wireless":"Bluetooth, Wifi"}',
                'created_at' => '2022-01-21 14:44:20',
                'updated_at' => '2022-01-21 14:44:20',
            ),
        ));
        
        
    }
}