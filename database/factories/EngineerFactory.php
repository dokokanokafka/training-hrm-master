<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

// $factory->define(Model::class, function (Faker $faker) {
$factory->define(\App\Engineer::class, function (Faker $faker) {
return [
    'last_name' => $faker->lastName,
    'first_name' => $faker->firstName,
    'last_name_furigana' => $faker->lastKanaName,
    'first_name_furigana' => $faker->firstKanaName,
    // 'last_name_furigana' => $faker->lastName,
    // 'first_name_furigana' => $faker->firstName,
    'gender' => $faker->randomElement($array=['男性','女性']),
    // 'birth_date' => $faker->date($format='Y-m-d',$max='now'),
    'birth_date' => $faker->dateTimeBetween('-50 years', '-20years')->format('Y-m-d'),
    'email' => $faker->email,
    'tel' => $faker->phoneNumber,
    'address' => $faker->address,
    'postal_code' => $faker->postcode,
    'closest_station' => $faker->randomNumber(1),
    'educational_background' => $faker->randomNumber(1),
    'resume' => $faker->randomNumber(1),
    'job_history_sheet' => $faker->randomNumber(1),
    // 'comment' => $faker->randomNumber(1),
    // 'inhouse_status_id' => $faker->numberBetween(1, 200) ,
    // 'employment_status_id' => $faker->numberBetween(1, 200) ,
    // 'engineer_skill_id' => $faker->numberBetween(1, 200) ,
    // 'human_skill_id' => $faker->name,
    'created_at' => $faker->date($format='Y-m-d',$max='now')	,
    'updated_at' => $faker->date($format='Y-m-d',$max='now')	,
    // 'delated_at' => $faker->date($format='Y-m-d',$max='now')	,
    ];
});
