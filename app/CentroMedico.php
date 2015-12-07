<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentroMedico extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'centros_medicos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nombre', 'direccion_id'];

	/**
	 * Devuelve los medicos que trabajan en este centro medico.
	 * 
	 * @return App\Medico
	 */
	public function medicos()
	{
		return $this->hasMany('App\Medico', 'centro_medico_id')->orderBy('especialidad_id');
	}
}
