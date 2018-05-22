<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *a
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'role','api_token', 'photo'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function news()
    {
        return $this->hasMany(News::class);
    }
    
    protected $table='users';

    public function sections()
    {
        return $this->hasOne('App\Sections','user_id');
    }
}
