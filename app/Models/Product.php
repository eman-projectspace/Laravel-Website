<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
 protected $fillable = [
    'title', 'author', 'category', 'price', 'stock', 'description', 'images'
];


   // Product.php (Model)
protected $casts = [
    'images' => 'array',
];

}

