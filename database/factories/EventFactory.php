<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use App\User;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'title' => 'Séance du ',
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'start_at' => $faker->dateTimeBetween($startDate = '- 90 days', $endDate = '+ 60 days', $timezone = null),
        'created_by' => User::where('is_adherent', 1)->first(),
    ];
});
