<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $name
 * @property int $folder_id
 * @property string $path
 * @property string $extension
 */
class File extends Model
{
    protected $appends = ['content'];
    protected $hidden = ['content'];

    public function folder() : BelongsTo
    {
        return $this->belongsTo('App\Folder', 'folder_id');
    }

    public function getContentAttribute() : string
    {
        return $this->attributes['content'];
    }
}
