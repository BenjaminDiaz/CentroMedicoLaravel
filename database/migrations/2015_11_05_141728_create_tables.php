<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previsiones_medicas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('comunas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('direcciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('calle');
            $table->string('numero');
            $table->integer('comuna_id')->unsigned();
            $table->timestamps();

            $table->foreign('comuna_id')
                  ->references('id')
                  ->on('comunas')
                  ->onDelete('cascade');
        });

        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('rut')->unique();
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('genero');
            $table->string('telefono');
            $table->integer('direccion_id')->unsigned();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('prevision_medica_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('direccion_id')
                  ->references('id')
                  ->on('direcciones')
                  ->onDelete('cascade');
            $table->foreign('prevision_medica_id')
                  ->references('id')
                  ->on('previsiones_medicas')
                  ->onDelete('cascade');
        });

        Schema::create('especialidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('centros_medicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('direccion_id');
            $table->timestamps();

            $table->foreign('direccion_id')
                  ->references('id')
                  ->on('direcciones')
                  ->onDelete('cascade');
        });

        Schema::create('medicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->integer('centro_medico_id');
            $table->integer('especialidad_id');
            $table->timestamps();

            $table->foreign('centro_medico_id')
                  ->references('id')
                  ->on('centros_medicos')
                  ->onDelete('cascade');
            $table->foreign('especialidad_id')
                  ->references('id')
                  ->on('especialidades')
                  ->onDelete('cascade');
        });

        Schema::create('horas_medicas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->datetime('hora_inicio');
            $table->datetime('hora_termino');
            $table->integer('medico_id');
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('medico_id')
                  ->references('id')
                  ->on('medicos')
                  ->onDelete('cascade');                  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comunas');
        Schema::drop('previsiones_medicas');
        Schema::drop('direcciones');
        Schema::drop('users');
        Schema::drop('especialidades');
        Schema::drop('centros_medicos');
        Schema::drop('medicos');
        Schema::drop('horas_medicas');

    }
}
