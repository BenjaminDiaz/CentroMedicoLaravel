<?php namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Comuna;
use App\User;
use App\Direccion;
use App\PrevisionMedica;
use Validator;
use RUT;


class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	protected $redirectTo = '/';

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct()
	{
		// $this->auth = $auth;
		// $this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
	public function getRegister()
    {
        $comunas = Comuna::all();
        $previsiones = PrevisionMedica::all();
        return view('auth.register', ['comunas' => $comunas, 'previsiones' => $previsiones]);
    }

	/**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	    public function postLogin(Request $request)
	    {
	    	$this->validate($request, [
	    		$this->loginUsername() => 'required', 'password' => 'required',
	    		]);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
	    	$throttles = $this->isUsingThrottlesLoginsTrait();

	    	if ($throttles && $this->hasTooManyLoginAttempts($request)) {
	    		return $this->sendLockoutResponse($request);
	    	}

	    	$credentials = $this->getCredentials($request);
	    	//Normaliza el formato del rut antes de intentar realizar el login.
	    	$credentials['rut'] = RUT::clean($credentials['rut']);

	    	if (Auth::attempt($credentials, $request->has('remember'))) {
	    		return $this->handleUserWasAuthenticated($request, $throttles);
	    	}

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
	    	if ($throttles) {
	    		$this->incrementLoginAttempts($request);
	    	}

	    	return redirect($this->loginPath())
	    	->withInput($request->only($this->loginUsername(), 'remember'))
	    	->withErrors([
	    		$this->loginUsername() => $this->getFailedLoginMessage(),
	    		]);
	    }

     /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
        public function loginUsername()
        {
        	return 'rut';
        }

	 /**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
		public function validator(array $data)
		{
			return Validator::make($data, [
				'nombre' => 'required|max:255',
				'rut' => 'required|rut|unique:users',
				'apellido_paterno' => 'required|max:255',
				'apellido_materno' => 'required|max:255',
				'genero' => 'required',
				'telefono' => 'numeric|required',
				'calle' => 'required',
				'numero' => 'required',
				'comuna' => 'required',	
				'prevision' => 'required',			
				'email' => 'required|email|max:255|unique:users',
				'password' => 'required|confirmed|min:6',
				]);
		}

	/**
	 * Crea un nuevo usuario. Primero revisa si la direccion ya existe. Si es asi, asocia al usuario
	 * a esta. Sino, crea una nueva.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		$direccion = Direccion::all()->where('calle', $data['calle'])->where('numero', $data['numero'])->where('comuna_id', $data['comuna'])->first();

		if(empty($direccion)) {
			$direccion = Direccion::create([
			'calle' => $data['calle'],
			'numero' => $data['numero'],
			'comuna_id' => $data['comuna'],
			]);
		}

		$user = User::create([
			'nombre' => $data['nombre'],
			'rut' => $data['rut'],
			'apellido_paterno' => $data['apellido_paterno'],
			'apellido_materno' => $data['apellido_materno'],
			'genero' => $data['genero'],
			'telefono' => $data['telefono'],
			'direccion_id' => $direccion->id,
			'prevision_medica_id' => $data['prevision'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			]);


		return $user;
	}

}
