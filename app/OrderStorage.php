<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStorage extends Model
{
    protected $fillable = [
        'id', 'cart_data','order_id'
    ];

    
    public function setCartDataAttribute($value)
    {
        $this->attributes['cart_data'] = serialize($value);
    }


    

    public function getCartDataAttribute($value)
    {
        return unserialize($value);
    }
}
