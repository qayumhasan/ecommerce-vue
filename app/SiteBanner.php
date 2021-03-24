<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteBanner extends Model
{
    public function ban()
    {
        return $this->belongsTo('App\CategoryBanner', 'siteban_id', 'id');
    }
}
