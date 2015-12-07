<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrevisionMedica extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'previsiones_medicas';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nombre'];

	/**
	 * Devuelve los usuarios que poseen esta prevision medica.
	 * 
	 * @return App\User
	 */
	public function users()
	{
		return $this->hasMany('App\User', 'prevision_medica_id');
	}
}
