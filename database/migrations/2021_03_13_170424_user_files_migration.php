<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserFilesMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_files', function (Blueprint $table) {
            $table->increments('id');
           
            $table->string('file_name');
            $table->string('url');//->nullable();
            $table->softDeletes();
            // Añadimos la clave foránea con User. user_id
          
            $table->integer('user_id')->unsigned();

            // Indicamos cual es la clave foránea de esta tabla:
            $table->foreign('user_id')->references('id')->on('users');

            // Para que también cree automáticamente los campos timestamps (created_at, updated_at)
            $table->timestamps();
        });
    }
     
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_files');
    }
}
