<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Especialidad;

class EspecialidadController extends Controller
{

    /**
     * Muestra la especialidad y los medicos que son de esta.
     *
     * @param  int  $especialidad_id
     * @return \Illuminate\Http\Response
     */
    public function show($id)    
    {
        $especialidad = Especialidad::findOrFail($id);
        $medicos = $especialidad->medicos;

        return view('pages.especialidad')->with('medicos', $medicos)->with('especialidad', $especialidad);
    }

 
}
