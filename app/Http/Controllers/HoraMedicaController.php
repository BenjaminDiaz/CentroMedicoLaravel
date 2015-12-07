<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\HoraMedica;

use Auth;

class HoraMedicaController extends Controller
{
    /**
     * Solo es accesible a usuarios registrados.
     */
    public function __construct() {
       $this->middleware('auth');
    }

    /**
     * Agenda hora medica.
     * @param  $hora_medica_id
     * @return Response Devuelve a la pagina principal.
     */
    public function agendar($id) {
        $user = Auth::user();
        $hora = HoraMedica::findOrFail($id);
        //Revisa si el usuario ya tiene agendada una hora con ese medico
        foreach ($user->horasMedicas as $horaMedica) {
            if($horaMedica->medico == $hora->medico) {
                return back()->withErrors(['Solo se permite una hora agendada por medico.']);
            }
        }
        $hora->user_id = $user->id;
        $hora->save();
        return redirect('');        
    }

    /**
     * Cancela hora medica.
     * @param  $hora_medica_id
     * @return Response Devuelve a la pagina principal.
     */
    public function cancelar($id) {
        $user = Auth::user();
        $hora = HoraMedica::findOrFail($id);
        if($user->id == $hora->user_id) {
            $hora->user_id = null;
            $hora->save();
        }
        return redirect('');
    }
}
