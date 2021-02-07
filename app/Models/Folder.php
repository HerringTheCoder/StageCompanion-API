<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $owner_Id
 * @property int $band_Id
 * @property string $name
 */
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
