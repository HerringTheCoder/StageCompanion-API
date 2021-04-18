<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $leaderId
 */
class Band extends Model
{
    protected $guarded = [
        'leader_id'
    ];

    public function leader()
    {
        return $this->belongsTo('App\User', 'leader_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->as('bandUsers')->withPivot('role');
    }
}
