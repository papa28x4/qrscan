<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\AdjustTime;

class Item extends Model
{
    use HasFactory, AdjustTime;

    protected $fillable = [
        'color', 'product_id', 'user_id', 'serial_no', 'qr_code'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getRouteKeyName()
    {
        return 'serial_no';
    }
}
