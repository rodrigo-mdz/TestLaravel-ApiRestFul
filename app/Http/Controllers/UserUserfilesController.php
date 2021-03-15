<?php

namespace App\Http\Controllers;




namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\User_files;

class UserUserfilesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($iduser)
	{
		// Devolverá todos los files.
		//return "Mostrando los files del user con Id $iduser";
		$user=User::find($iduser);

		if (! $user)
		{
			// Se devuelve un array errors con los errores encontrados y cabecera HTTP 404.
			// En code podríamos indicar un código de error personalizado de nuestra aplicación si lo deseamos.
			return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra un usuario con ese código.ejemplo de ruta api/user/{id user}/user_files'])],404);
		}

		return response()->json(['user_id'=>$iduser,'status'=>'ok','uploaded_file'=>':','data'=>$user->user_files()->get()],200);
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($iduser)
	{
		//
		return "Se muestra formulario para crear un file del usuario $iduser.";
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($iduser)
	{
		//
		 
        User_files::create($iduser->all());
        return 'completa';
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($iduser,$idfiles)
	{
		//
		return "Se muestra file $idfiles del usuario $iduser";
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($iduser,$idfile)
	{
		//
		return "Se muestra formulario para editar el file $idfile del usuario $iduser";
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($iduser,$idfile)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($iduser,$idfile)
	{
		//
	}

}