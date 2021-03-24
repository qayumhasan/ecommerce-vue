<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = [
           'user_id',
          'user_address',
          'user_post_office',
          'user_postcode',
          'user_country_id',
          'user_division_id',
          'payment_district_id',
          'payment_upazila_id',
          'is_shipping_address'
    ];
}
