<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{

    protected $hidden = ['created_at','updated_at'];
    public function category(){
         return $this->belongsTo('App\Category','cate_id','id');
          }

}
