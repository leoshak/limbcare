<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'nic' => $faker->sentence(5),
        'employeeType' => $faker->sentence(5),
        'emp_pic' => $faker->sentence(5),
        'birthday' => $faker->sentence(5),
        'address' => $faker->text(),
    ];
});
