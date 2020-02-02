<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

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
    public function band()
    {
        $this->belongsTo('App\Band', 'band_id');
    }

    public function folder()
    {
        $this->hasMany('App\Folder');
    }

    public function files()
    {
        $this->folder->files;
    }
    //TODO: Sorting up relations between user, files and folders, adding roles? Pivot table between bands and users?
}
