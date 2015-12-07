<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CentroMedico;

class CentroMedicoController extends Controller
{

    /**
     * Muestra el centro medico y los medicos que trabajan en este.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cm = CentroMedico::findOrFail($id);
        $medicos = $cm->medicos;
        return view('pages.centromedico', ['centro_medico' => $cm , 'medicos' => $medicos]);
    }

}
