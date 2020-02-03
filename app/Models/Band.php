<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $guarded = [
        'leader_id'
    ];

    public function leader()
    {
        return $this->belongsTo('App\User', 'leader_id');
    }

    public function members()
    {
        return $this->belongsToMany('App\User');
    }
}
