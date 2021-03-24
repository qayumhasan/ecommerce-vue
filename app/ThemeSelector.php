<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThemeSelector extends Model
{
    protected $fillable = [
        'css_name', 'js_name','header_name','footer_name','theme_name','status'
    ];

}
