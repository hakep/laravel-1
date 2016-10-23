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

//$factory->define(App\User::class, function (Faker\Generator $faker) {
//    static $password;
//
//    return [
//        'name' => $faker->name,
//        'email' => $faker->unique()->safeEmail,
//        'password' => $password ?: $password = bcrypt('secret'),
//        'remember_token' => str_random(10),
//    ];
//});

$factory->define(App\Page::class, function () {

    $faker = \Faker\Factory::create('ru_RU');

    return [
        'url'   => $faker->unique()->slug($maxNbChars = 3),
        'title'   => $faker->sentence(3),
        'published_at' => $faker->boolean,
        'content'  => $faker->realText($maxNbChars = 400, $indexSize = 2),
    ];
});
