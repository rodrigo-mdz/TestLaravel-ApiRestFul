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
        'id','name', 'last_name','deleted_at'
    ];
// Aquí ponemos los campos que no queremos que se devuelvan en las consultas.
protected $hidden = ['updated_at']; 
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
    public function user_files()
	{	
		// 1 user tiene muchos files
		// $this hace referencia al objeto que tengamos en ese momento de Users.
		return $this->hasMany('App\User_files');
	}
}
