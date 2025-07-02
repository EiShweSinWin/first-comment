<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'code', 'purchase_price', 'sale_price', 'stock', 'category_id', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->using(OrderProduct::class)
            ->withPivot(['quantity', 'unit_price', 'total_price']);
    }
}