<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturnProduct extends Model
{
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'return_products';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

        /**
     * Get the post that owns the comment.
     */
    public function users()
    {
        return $this->belongsTo('App\CustomarAccount','user_id','userid')->withDefault([
            'name' => 'Deleted',
        ]);;
    }
}
