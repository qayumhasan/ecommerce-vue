<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsModel extends Model
{
    protected $fillable = ['sms_url','sms_username','sms_password'];
}
