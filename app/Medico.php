<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'medicos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nombre', 'apellido_paterno', 'centro_medico_id', 'especialidad_id'];

	/**
	 * Devuelve las horas medicas correspondientes al medico
	 * 
	 * @return App\HoraMedica
	 */
	public function horasMedicas()
	{
		return $this->hasMany('App\HoraMedica', 'medico_id')->orderBy('hora_inicio', 'asc');
	}

	/**
	 * Devuelve al especialidad correspondiente al medico
	 * 
	 * @return App\Especialidad
	 */
	public function especialidad()
	{
		return $this->belongsTo('App\Especialidad', 'especialidad_id');
	}

	/**
	 * Devuelve el centro medico en el cual trabaja el medico
	 * 
	 * @return App\CentroMedico
	 */
	public function centroMedico()
	{
		return $this->belongsTo('App\CentroMedico', 'centro_medico_id');
	}
}
