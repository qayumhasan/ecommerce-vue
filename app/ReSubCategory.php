<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReSubCategory extends Model
{
    protected $hidden = ['created_at','updated_at'];
    public function subcate(){
     return $this->belongsTo('App\SubCategory','subcate_id','id');
    }
    public function category(){
     return $this->belongsTo('App\Category','cate_id','id');
    }
}
