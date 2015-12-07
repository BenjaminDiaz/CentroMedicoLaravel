<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use RUT;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['rut', 'nombre', 'apellido_paterno', 'apellido_materno', 'telefono', 'direccion_id', 'genero', 'email', 'password', 'prevision_medica_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	 * Devuelve las horas medicas tomadas por el usuario/
	 * 
	 * @return App\HoraMedica
	 */
	public function horasMedicas()
	{
		return $this->hasMany('App\HoraMedica', 'user_id')->orderBy('hora_inicio', 'asc');
	}

	/**
	 * Devuelve la direccion correspondiente al usuario.
	 * 
	 * @return App\Direccion
	 */
	public function direccion()
	{
		return $this->belongsTo('App\Direccion', 'direccion_id');
	}

	/**
	 * Devuelve la prevision medica correspondiente al usuario.
	 * 
	 * @return App\Prevision
	 */
	public function prevision()
	{
		return $this->belongsTo('App\PrevisionMedica', 'prevision_medica_id');
	}

	/**
	 * Mutator para normalizar el formato del RUT.
	 * 
	 * @param $rut
	 */
	public function setRutAttribute($rut) {
	    $this->attributes['rut'] = RUT::clean($rut);
	}
}
