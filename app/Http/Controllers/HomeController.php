<?php namespace App\Http\Controllers;

use App;
use Auth;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

	/**
	 * Muestra la pagina principal.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user();
		$especialidades = App\Especialidad::all();
		$medicos = App\Medico::all();
		$centros_medicos = App\CentroMedico::all();
		return view('home', ['user' => $user, 'especialidades' => $especialidades, 'medicos' => $medicos,'centros_medicos' => $centros_medicos]);
	}

}
