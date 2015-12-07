<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'especialidades';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nombre'];

	/**
	 * Devuelve los medicos correspondientes a esta especialidad.
	 * @return App\Medico
	 */
	public function medicos()
	{
		return $this->hasMany('App\Medico', 'especialidad_id');
	}
}
