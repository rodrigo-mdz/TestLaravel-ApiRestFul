<?php

namespace App\Http\Controllers;


use Response;
use Illuminate\Http\Request;
//se importa storage para poder guardar los files en local
use Illuminate\Support\Facades\Storage;
use App\User_files;
class UserfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       return response()->json(['Files'=>':','status'=>'ok','File'=>user_files::all()], 200);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $iduser)
    {
        //Guarda archivo en local storage /public
        $file= $iduser->file('file')->store('public');
        $url=Storage::url($file);
        $response = Response::json($file,200); 
        User_files::create([
            'url'=>$url ]);
        return response()->json(['Files'=>':','status'=>'ok','File'=>user_files::all()], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($iduser)
    {
        //
        // Corresponde con la ruta /user_files/{user}
		// Buscamos un Usuario por el ID.
		$user_files=User_files::find($iduser);

		// Chequeamos si encontró o no el user
		if (! $user_files)
		{
			// Se devuelve un array errors con los errores detectados y código 404
			return response()->json(['errors'=>Array(['code'=>404,'message'=>'No se encuentra un usuario con ese código.'])],404);
		}

		// Devolvemos la información encontrada con los user y sus files correspondientes.
		return response()->json(['user_id'=>$iduser,'status'=>'ok','File'=>$user_files],200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
