<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_files extends Model
{
  // Nombre de la tabla en MySQL.
	protected $table="user_files";

	// Atributos que se pueden asignar de manera masiva.
	protected $fillable = array('id','url','user_id','created_at','deleted_at');
	
	// Aquí ponemos los campos que no queremos que se devuelvan en las consultas.
	protected $hidden = ['updated_at']; 

public function user_files()
	{	
		// 1 user tiene muchos files
		// $this hace referencia al objeto que tengamos en ese momento de user.
		return $this->hasMany('App\User');
	}

}