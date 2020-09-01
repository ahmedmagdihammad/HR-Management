<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'name' => $faker->text(45),
        'mobile_1' => $faker->mobile_1,
        'mobile_2' => $faker->mobile_2,
        'address' => $faker->address,
        'n_passport_id' => $faker->n_passport_id,
        'email' => $faker->email,
        'gender' => $faker->gender,
        'job' => $faker->job,
        'date_birth' => $faker->date_birth,
        'nationality' => $faker->nationality,
        'notes' => $faker->notes,
        'wishes' => $faker->wishes,
        'reference' => $faker->reference,
        'commission_id' => $faker->commission_id,
    ];
});
