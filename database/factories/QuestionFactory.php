<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Models\Question::class, function (Faker $faker) {
    return [
    	'user_id' => App\User::all()->random()->id,
        'title' => $name = $faker->text,
        'slug' => str_slug($name),
        'body' => $faker->paragraph(rand(3, 7), true),
        'views'=> rand(0, 10),
        
        'votes_count'=> rand(0, 10),


       
    ];
});
