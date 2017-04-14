<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;*/

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{
    /*use Notifiable;*/
    use AuthenticableTrait;
    
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'user_name', 'email', 'pleasures', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guarded = [
        'id',
    ];

    public function bookMarks(){
        return $this->hasMany('App\BookMark', 'user_id');
    }

    public function folders(){
        return $this->hasMany('App\Folder', 'user_id');
    }
}
