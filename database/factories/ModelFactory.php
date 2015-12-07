<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Comuna::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->city,
    ];
});

$factory->define(App\Direccion::class, function (Faker\Generator $faker) {
    return [
        'calle' => $faker->streetAddress,
        'numero' => $faker->buildingNumber,
        'comuna_id' => App\Comuna::all()->random()->id
    ];
});

$factory->define(App\CentroMedico::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->company,
        'direccion_id' => App\Direccion::all()->random()->id
    ];
});


$factory->define(App\Especialidad::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->colorName,
    ];
});

$factory->define(App\Medico::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->name,
        'apellido_paterno' => $faker->lastName,
        'centro_medico_id' => App\CentroMedico::all()->random()->id,
        'especialidad_id' => App\Especialidad::all()->random()->id
    ];
});

$factory->define(App\HoraMedica::class, function (Faker\Generator $faker) {
	$time = $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 years');
	$timeStart = Carbon\Carbon::instance($time);
	$timeEnd = Carbon\Carbon::instance($time);
	$timeEnd->addMinutes(20);
    return [
        'hora_inicio' => $timeStart,
        'hora_termino' => $timeEnd,
        'medico_id' => App\Medico::all()->random()->id
    ];
});

