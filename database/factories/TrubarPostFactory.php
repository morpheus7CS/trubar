<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Wewowweb\Trubar\Models\TrubarPost;
use Wewowweb\Trubar\Models\TrubarUser;
use Wewowweb\Trubar\Models\User;

$factory->define(TrubarPost::class, function (Faker $faker) {
    return [
    'slug' => $faker->slug,
    'author_id' => factory(TrubarUser::class)->create()->id,
    'post_type' => $faker->word,
    'post_status' => $faker->word,
    'parent_id' => null,
    'title' => $faker->sentence,
    'excerpt' => $faker->sentences(3, true),
    'body' => $faker->randomHtml(),
    'published_at' => $faker->dateTimeThisMonth,
    ];
});
