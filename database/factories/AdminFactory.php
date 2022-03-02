<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(\Stephendevs\Lad\Models\Admin\Admin::class, function (Faker $faker) {
    return [
        'username' => $faker->name,
        'email' => "admin@ldashboard.com",
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
    ];
});
