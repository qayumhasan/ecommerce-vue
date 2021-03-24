<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderPlace extends Model
{
    protected $guarded = [];
    public function usermain()
    {

        
        return $this->belongsTo('App\User', 'user_id', 'id');
    }


   
}
