<?php

namespace App;

use App\ContractImage;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'contract_id',
        'image',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function contract_images()
    {
        return $this->hasMany(ContractImage::class);
    }


}
