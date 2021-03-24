<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturnAllProduct extends Model
{
      /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'return_all_products';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    
}
