<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'direcciones';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['calle', 'numero', 'comuna_id'];

	/**
	 * Devuelve los usuarios que poseen esta direccion.
	 * 
	 * @return App\User
	 */
	public function usuarios()
	{
		return $this->hasMany('App\User', 'direccion_id');
	}
}
