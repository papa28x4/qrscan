<?php
namespace App\Helpers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Product;
use App\Models\PrintJob;
use App\Models\Category;
use App\Traits\HasNotification;
use Illuminate\Support\Facades\Route;

class AppHelpers{

    use HasNotification;
   
    public static function printOptions()
    {
        return ([
            'job_type' => PrintJob::$JOBTYPE,
            'color_code' => PrintJob::$COLORCODE,
            'color_num' => PrintJob::$COLORNUM,
            'orientation' => PrintJob::$ORIENTATION,
            'size' => PrintJob::$SIZE,
            'paper_type' => PrintJob::$MEDIATYPE,
            'double_sided' => PrintJob::$DOUBLESIDED,
            'paper_gram'=> PrintJob::$PAPERGRAM,
            'binding' => PrintJob::$BINDING,
            'finishing' => PrintJob::$FINISHING,
        ]);
    }

     public static function userCount()
     {
        $userCount = count(User::all()); 
        return $userCount;
    }

     public static function adminCount()
     {
        $adminCount = count(Admin::all()); 
        return $adminCount;
    }

    public static function jobCount()
    {
        $jobCount = count(PrintJob::completed()->get()); 
        return $jobCount;
    }

    public static function unreadNotificationsCount($type="all")
    {
    //    return self::getNotifications($type);

    }

    public static function newJobCount(){
        $jobCount = count(PrintJob::all()); 
        return $jobCount;
    }

    public static function priceRange()
    { 
        if(Route::currentRouteName() == 'products.equipment'){
            $userCategory = 'equipment';
        }else if(Route::currentRouteName() == 'products.consumables'){
            $userCategory = 'consumables';
        }else{
            $categories = Category::type('products')->get();

            $userCategory =  $categories->pluck('slug')->toArray();    
        };

        $minPrice = Product::filterCategory($userCategory)->oldest('sale_price')->first()->sale_price;
        $maxPrice = Product::filterCategory($userCategory)->latest('sale_price')->first()->sale_price;

        return [
                'min' =>  $minPrice,
                'max' => $maxPrice
            ];

    }

    public static function cartState($product_id, $list=null){
        $items = auth()->user() ? \Cart::session(auth()->id())->getContent() : [];
        
        if(request()->input('layout') === 'list' || \Route::currentRouteName() == 'products.show' || $list){
            $shopCart = count($items) && count($items->where('id', $product_id)) ? 'remove-cart' : 'add-cart';
        }else{
            $shopCart = count($items) && count($items->where('id', $product_id)) ? 'fl-bigmug-line-minus79 remove-cart' : 'fl-bigmug-line-shopping202 add-cart';
        }

        return $shopCart;
    }
}