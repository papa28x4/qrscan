<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Traits\AdjustTime;

class Department extends Model
{
    use HasFactory, Sluggable, AdjustTime;

    protected $fillable = [
        'name', 'slug'
    ];

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

    public function users(){
        return $this->hasMany(User::class);
    }
}
