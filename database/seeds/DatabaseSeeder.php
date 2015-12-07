<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Model::unguard();
		// $this->call('UserTableSeeder');
		factory(App\Comuna::class, 10)->create();
		factory(App\Direccion::class, 10)->create();
		for ($i=1; $i < 4 ; $i++) { 
			DB::table('centros_medicos')->insert([
            	'nombre' => "Centro Medico $i",
            	'direccion_id' => App\Direccion::all()->random()->id,
            	'created_at' => Carbon\Carbon::now(),
            	'updated_at' => Carbon\Carbon::now(),
        	]);
		}
		$especialidades = ['Dermatologia', 'Kinesiologia', 'Psicologia'];
		foreach ($especialidades as $especialidad) {
			DB::table('especialidades')->insert([
            	'nombre' => "$especialidad",
            	'created_at' => Carbon\Carbon::now(),
            	'updated_at' => Carbon\Carbon::now(),
        	]);
		}
		$previsiones = ['Fonasa', 'Cruz Blanca', 'Colmena'];
		foreach ($previsiones as $prevision) {
			DB::table('previsiones_medicas')->insert([
            	'nombre' => "$prevision",
            	'created_at' => Carbon\Carbon::now(),
            	'updated_at' => Carbon\Carbon::now(),
        	]);
		}		
		factory(App\Medico::class, 5)->create();
		factory(App\HoraMedica::class, 10)->create();
	}

}
