<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * set up roles
     * @param string|array $roles
     */

    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRoles($roles) || abort(401, 'this action is unauthorized');
        }

        return $this->hasRole($roles) || abort(401, 'this action is unauthorized');
    }

    /**
     * Check multiple roles
     *
     * @param array $roles
     */

    public function hasAnyRoles($roles)
    {
        return null !== $this->roles()->where('name', $roles)->first();
    }

    /**
     * Check one role
     *
     * @param string $role
     */

    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }


}
