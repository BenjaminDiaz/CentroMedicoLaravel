<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Medico;

class MedicoController extends Controller
{
    /**
     * Lista de medicos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medico::all();
        return view('pages.medicos')->with('medicos', $medicos);
    }


    /**
     * Medico y sus horas disponibles.
     *
     * @param  int  $medico_id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medico = Medico::findOrFail($id);
        $horasMedicas = $medico->horasMedicas();
        return view('pages.medico', [
            'medico' => $medico, 
            'horasMedicas' => $horasMedicas,
            ]);
    }


}
