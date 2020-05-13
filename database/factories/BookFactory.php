<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'author_id' => Factory('App\Author'),
        'title' => $faker->sentence(),
        'annotation' => $faker->paragraph(),
        'published_at' => $faker->date()
    ];
});
