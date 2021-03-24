<?php

namespace App;

use App\Product;
use App\FlashDeal;
use Illuminate\Database\Eloquent\Model;

class FlashDealDetail extends Model
{
    protected $fillable = [

        'product_id',
        'flash_deal_id',
        'discount',
        'discount_type',
        'is_deleted',
        'status',

    ];

    public function flash_deal()
    {
        return $this->belongsTo(FlashDeal::class);
    }

   
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
