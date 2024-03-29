<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

/**
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $password
 */
class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, UsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Returns band associated to user.
     * @return JSON
     */
    public function bands()
    {
        return $this->belongsToMany('App\Band')->as('bandUsers')->withPivot('role');
    }

    /**
     * Returns user's folders
     * @return Folder
     */
    public function folder()
    {
        return $this->hasMany('App\Folder');
    }

    /**
     * Returns list of user's files
     * @return File
     */
    public function files()
    {
        return $this->folder->files;
    }
}
