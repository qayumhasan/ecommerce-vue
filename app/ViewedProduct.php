<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewedProduct extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'viewedproducts';



    protected $guarded = [];
   
}
