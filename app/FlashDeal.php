<?php

namespace App;

use App\FlashDealDetail;
use Illuminate\Database\Eloquent\Model;

class FlashDeal extends Model
{
    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'is_deleted',
        'status',
    ];
    
    protected $hidden = ['created_at','updated_at'];
    public function flash_deal_details()
    {
        return $this->hasMany(FlashDealDetail::class)->where('status',1)->where('is_deleted',0);
    }

    protected $dates = [
        'end_date',
    ];

}
