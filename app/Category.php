<?php

namespace App;
use App\SubCategory;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $hidden = ['created_at','updated_at'];
    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class, 'cate_id');
    }
}
