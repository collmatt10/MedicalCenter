<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'postal_address', 'phonenumber'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
     return $this->hasRole('admin');
    }

    public function doctor(){
      return $this->hasOne('App\Doctor');
    }

    public function patient(){
      return $this->hasOne('App\Patient');
    }

    public function roles(){
      return $this->belongstoMany('App\Role', 'user_role');
    }

        public function authorizeRoles($roles){
          if (is_array($roles)) {
            return $this->hasAnyRole($roles) || abort(401, 'This action is unauthorized');
          }
        return $this->hasRole($roles) || abort(401, 'This action is unauthorized');
        }


     public function hasRole($role)
     {
       return null !== $this->roles()->where('name', $role)->first();//used to check what role the user has
     } //if this user has a  role with a name, retireve the data and if null, return false

     public function hasAnyRole($roles)
     {
       return null !== $this->roles()->whereIn('name', $roles)->first();


    if ($user->authorizeRoles(['admin', 'doctor'])) {
      // code...
    }

    else {
      // code...
    }

}

}
