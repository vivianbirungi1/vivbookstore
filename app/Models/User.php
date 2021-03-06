<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function reviews()
    {
      //user has many reviews
      return $this->hasMany('App\Models\Review');
    }

    public function customer()
    {
      //user has one customet
      return $this->hasOne('App\Models\Customer');
    }




    public function roles()
    {
      //creating a dynamic property called roles inside user. will make the connection for us when creating and requesting users
      //will return an array of roles
      return $this->belongsToMany('App\Models\Role', 'user_role');

    }

    public function authorizeRoles($roles)
    {
      if (is_array($roles)) {
        return $this->hasAnyRole($roles); //short circuit syntax
      }
      return $this->hasRole($roles);
    }

    public function hasAnyRole($roles) //for checking list of roles
    {
      return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasRole($role) //for checking one specific role
    {
      return null !== $this->roles()->where('name', $role)->first();
    }


}
