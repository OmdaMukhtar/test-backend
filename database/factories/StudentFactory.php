<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'class_id' => random_int(1, 5),
        'date_of_birth' => $faker->date,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
    ];
});
