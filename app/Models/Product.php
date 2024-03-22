<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Traits\AdjustTime;
use NumberFormatter;

class Product extends Model
{

    use HasFactory, AdjustTime, Sluggable;

    protected $fillable = [
        'name', 'code', 'description', 'slug', 'user_id',
        'category_id', 'cost', 'brand_id', 'basic_details'
    ];

    protected $with = ['images'];

    // protected $appends = ['stars'];
    
    protected $casts = [
        'basic_details' => 'array'
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeSearch($query, $search=null)
    {
        return $query->where('name', 'LIKE', "%$search%");
    }

    public function scopePriceRange($query, $min_price, $max_price)
    {
        return $query->whereBetween('sale_price', [$min_price, $max_price]);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_products', 'product_id', 'order_id')->withPivot('quantity', 'price');
    }

    public function scopeFilterCategory($query, $categories)
    {   
        return $query->whereHas('category', function($query) use ($categories) {
            if(gettype($categories) == 'array'){
                return $query->whereIn('slug', $categories);
            }
            return $query->where('slug', $categories);
        });
    }

    public function cost()
    {
        $fmt = new NumberFormatter( 'en_NG', NumberFormatter::CURRENCY );
        $money = $fmt->formatCurrency($this->cost, "NGN");
        return str_replace(".00","", $money);
    }


    // public function reviews(){
    //     return $this->hasMany(ProductReview::class);
    // }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function getStarsAttribute()
    {
        $reviews = $this->reviews;
        $count = count($reviews);
        $average = $count > 0 ? number_format($reviews->sum('ratings')/$count, 1) : 0;

        return (float)$average;
    }

    public function getImageUrl($value)
    {
        return Storage::temporaryUrl($value, now()->addMinutes(60));
    }

    public function truncateName(){
        return (strlen(strip_tags($this->name)) > 19) ? substr(strip_tags($this->name), 0, 19) . '...' : strip_tags($this->name);
    }
}
