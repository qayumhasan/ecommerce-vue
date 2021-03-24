<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{


    public function category()
    {
        return $this->belongsTo('App\Category', 'cate_id', 'id');
    }
    public function subcate()
    {
        return $this->belongsTo('App\SubCategory', 'subcate_id', 'id');
    }

    public function totalbrand()
    {
        return $this->belongsTo('App\Brand', 'brand', 'id');
    }


    public function flashDeal()
    {
        return $this->belongsTo('App\FlashDealDetail', 'id', 'product_id');
    }

    public function getpriceAttribute()
    {
        if($this->flashDeal->discount_type == 2){
            return $this->product_price - $this->product_price * $this->flashDeal->discount / 100;
        }else{
            return $this->product_price - $this->flashDeal->discount;
        }
        
    }

}
