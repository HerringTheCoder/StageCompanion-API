<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $guarded = [];

    public function band()
    {
        return $this->belongsTo('App\Band', 'band_id');
    }

    public function user()
    {
       return $this->belongsTo('App\User', 'user_id');
    }
}
