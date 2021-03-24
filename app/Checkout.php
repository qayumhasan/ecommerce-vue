<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
       /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'checkout';


    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


        /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getProductsAttribute($value)
    {
        return json_decode($value);
    }


      /**
     * Get the return discription.
     */
    public function details()
    {
        return $this->hasMany('App\RefundReason','order_id','orderid');
    }
}
