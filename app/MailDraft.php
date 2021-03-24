<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailDraft extends Model
{
    protected $fillable = [
        'reply_email',
        'contract_id',
        'reply_subject',
        'reply_content',
    ];
}
