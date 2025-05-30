<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'total',
        'status',
        
    ];
    public function items()
{
    return $this->hasMany(OrderItem::class);  //	An order can have many items
}
}

