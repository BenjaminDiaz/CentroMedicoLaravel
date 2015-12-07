<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class HoraMedica extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'horas_medicas';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'medico_id', 'hora_inicio', 'hora_termino'];

	/**
	 * Additional fields to treat as Carbon instances.
	 *
	 * @var array
	 */
	protected $dates = ['hora_inicio', 'hora_termino'];

	/**
	 * Devuelve el usuario que tiene tomada la hora medica
	 * 
	 * @return  App\User
	 **/

	public function paciente() 
	{
		return $this->belongsTo('App\User', 'user_id');
	}

	/**
	 * Devuelve el medico correspondiente a la hora medica
	 * 
	 * @return App\Medico
	 **/

	public function medico()
	{
		return $this->belongsTo('App\Medico', 'medico_id');
	}

	/**
	 * Scope que permite obtener las horas disponibles.
	 * 
	 * @param  $query
	 * @return void 
	 */
	public function scopeDisponible($query)
	{
		$query->whereNull('user_id')->where('hora_inicio', '>', Carbon::now() );
	}

	/** 
	 * Mutator para user_id, que establece que si no se define valor para user_id, 
	 * se le asigne null.
	 * 
	 * @param $user_id 
	 */
	public function setUserIdAttribute($value)
	{
    	$this->attributes['user_id'] = $value ?: null;
	}
}
