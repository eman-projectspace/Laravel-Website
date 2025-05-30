<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
 protected $fillable = [
    'title', 'author', 'category', 'price', 'stock', 'description', 'images'
];


protected $casts = [
    'images' => 'array',
];

public function orderItems()
{
    return $this->hasMany(OrderItem::class);  //	A product can appear in many order items
}


}

