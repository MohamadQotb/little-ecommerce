<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'user_id',
        'subtotal',
        'recipient_name',
        'total',
        'shipping_cost',
        'status',
        'payment_method',
        'shipping_city',
        'shipping_address',
        'phone'
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items')
            ->withPivot('product_name', 'quantity', 'unit_price')
            ->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
