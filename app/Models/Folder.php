<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $guarded = [
        'owner_id'
    ];

    public function files()
    {
        $this->hasMany('App\File');
    }
}
