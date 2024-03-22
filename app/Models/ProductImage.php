<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    protected $fillable = [
        'images', 'product_id'
    ];

    protected $casts = [
        'images' => 'array'
    ];

    protected $appends = ['temp_url'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    // public function getImagesAttribute($value)
    // {
    //     return  array_map(function ($item) {
    //         return [
    //             'id' => $item->id,
    //             'src' => Storage::temporaryUrl($item->src, now()->addMinutes(60)), 
    //             'path' => $item->src
    //         ];
    //     }, json_decode($value));
    // }

    public function getTempURLAttribute()
    {
        $value = $this->images;

        return  array_map(function ($item) {
            return [
                'id' => $item['id'],
                'src' => Storage::temporaryUrl($item['src'], now()->addMinutes(60)), 
            ];
        }, $value);
    }
}
