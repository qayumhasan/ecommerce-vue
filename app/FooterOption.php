<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FooterOption extends Model
{
    protected $fillable = [
        'footer_text', 'address','phone','email','copyright','payment_image'
    ];
}
