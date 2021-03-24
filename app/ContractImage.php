<?php

namespace App;

use App\Contract;
use Illuminate\Database\Eloquent\Model;

class ContractImage extends Model
{
    protected $fillable = [

        'visitor_name',
        'visitor_email',
        'visitor_message',
        'status',
        'is_deleted',
        'is_seen',
        'is_replied',
        
    ];
    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
