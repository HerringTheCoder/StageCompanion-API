<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $user_id
 * @property int $band_id
 * @property bool $accepted
 */
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
