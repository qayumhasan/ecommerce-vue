<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DifferentAddress extends Model
{
      /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'different_address';


    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
