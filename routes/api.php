<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




 Route::resource('users','UserController');  // Todos los métodos menos Edit que mostraría un formulario de edición.

// Si queremos dar  la funcionalidad de ver todos los files tendremos que crear una ruta específica.
// Pero de files solamente necesitamos solamente los métodos index y show.
// Lo correcto sería hacerlo así:
Route::resource('user_files','UserfilesController'); 

// Como la clase principal es Users y un file no se puede crear si no le indicamos el Usuario,
// entonces necesitaremos crear lo que se conoce como  "Recurso Anidado" de Usuarios con user files.
// Definición del recurso anidado:
Route::resource('user.user_files','UserUserfilesController');

