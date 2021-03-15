<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

// Cargamos user por que lo usamos más abajo.
use App\User;


use Response;

// Activamos el uso de las funciones de caché.
use Illuminate\Support\Facades\Cache;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=Cache::remember('cacheusers',15/60,function()
		{
			// Para la paginación en Laravel se usa "Paginator"
			// En lugar de devolver 
			// return User::all();
			// devolveremos return User::paginate();
			// 
			// Este método paginate() está orientado a interfaces gráficas. 
			// Paginator tiene un método llamado render() que permite construir
			// los enlaces a página siguiente, anterior, etc..
			// Para la API RESTFUL usaremos un método más sencillo llamado simplePaginate() que
			// aporta la misma funcionalidad
			return User::simplePaginate(10);  // Paginamos cada 10 elementos.

		});
        //
        return response()->json(['status'=>'ok', 'siguiente'=>$users->nextPageUrl(),'anterior'=>$users->previousPageUrl(),'File'=>$users->items()],200);
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
     *
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $iduser)
    {
       
    
   
     
       }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        // Corresponde con la ruta /usuarios/{usuario}
		// Buscamos un usuario por el ID.
		$user=User::find($id);

		// Chequeamos si encontró o no el usuario
		if (! $user)
		{
			// Se devuelve un array errors con los errores detectados y código 404
			return response()->json(['errors'=>Array(['code'=>404,'message'=>'No se encuentra un usuario con ese código.'])],404);
		}

		// Devolvemos la información encontrada.
		return response()->json(['status'=>'ok','data'=>$user],200);

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
