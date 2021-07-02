<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ClassModel;
use Faker\Generator as Faker;

$factory->define(ClassModel::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'code' => uniqid(),
        'status' => random_int(0, 1),
        'description' => $faker->text(20),
    ];
});
