<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 5),
        'content' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true),
        'category' => $faker->randomElement($array = array('news', 'holistic', 'testimony','herbal')),
        'user_id' => $faker->randomElement($array = array(1,2)) 
    ];
});

