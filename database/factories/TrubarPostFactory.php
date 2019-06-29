<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use Wewowweb\Trubar\Models\TrubarPost;

$factory->define(TrubarPost::class, function (Faker $faker) {
    return [
    'slug' => $faker->slug,
    'author_id' => 1,
    'post_type' => $faker->word,
    'parent_id' => null,
    'title' => $faker->sentence,
    'excerpt' => $faker->sentences(3, true),
    'body' => $faker->randomHtml(),
    'published_at' => $faker->dateTimeThisMonth,
    ];
});
