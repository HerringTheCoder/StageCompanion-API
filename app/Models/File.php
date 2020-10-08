<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $folder_id
 * @property string $path
 * @property string $extension
 */
class File extends Model
{
    protected $guarded = [];

    public function folder()
    {
        return $this->belongsTo('App\Folder', 'folder_id');
    }
}
