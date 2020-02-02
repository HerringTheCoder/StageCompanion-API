<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $guarded = [
        'folder_id'
    ];

    public function folder()
    {
        return $this->belongsTo('App\Folder', 'folder_id');
    }
}
