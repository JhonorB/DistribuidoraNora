<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'price_unit',
        'price_dozen',
        'price_quarter',
        'price',
        'description',
        'category',
        'images',
        'stock',
        'is_active',
        'sizes',
        'colors',
    ];

    protected $casts = [
        'images' => 'array',
        'price_unit' => 'float',
        'price_dozen' => 'float',
        'price_quarter' => 'float',
        'price' => 'float',
        'stock' => 'integer',
        'is_active' => 'boolean',
        'sizes' => 'array',
        'colors' => 'array',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
