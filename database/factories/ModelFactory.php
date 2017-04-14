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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password = 00000000;

    return [
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'user_name' => $faker->userName,
        'email' => $faker->email,
        'pleasures' => $faker->text,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\BookMark::class, function (Faker\Generator $faker){
    return [
        'name' => $faker->word,
        'folder_id' => $faker->randomDigitNotNull,
        'url' => $faker->url,
        'note' => $faker->text(100)   ,
        'user_id' => $faker->randomDigitNotNull
    ];
});

$factory->define(App\Tag::class, function(Faker\Generator $faker){
    return [
        'name' => $faker->word,
        'user_id' => $faker->randomDigitNotNull
    ];
});

$factory->define(App\Folder::class, function(Faker\Generator $faker){
    return [
        "name" =>  $faker->word,
    	"description" =>$faker->sentence(8),
    	"user_id" => $faker->randomDigitNotNull
    ];
});