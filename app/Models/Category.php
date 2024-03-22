<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name', 'slug', 'description', 'type'
    ];

    public function prices(){
        return $this->hasMany(Price::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }
    
    public function scopeProductCount($query, $search=null, $min_price, $max_price){
        return $query->withCount(['products' => function ($query) use ($search, $min_price, $max_price) {
            $query->where('name', 'like', "%$search%")
                  ->whereBetween('sale_price', [$min_price, $max_price]);
        }]);
    }
}
