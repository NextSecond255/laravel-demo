<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Topic::class, function (Faker $faker) {
    $sentence = $faker->sentence();

    //随机取当月的某个时间
	$updateAt = $faker->dateTimeThisMonth();

	//创建时间，比修改时间提前
	$createAt = $faker->dateTimeThisMonth($updateAt);
	return [
		'title'      => $sentence,
		'content'    => $faker->text(),
		'excerpt'    => $sentence,
		'created_at' => $createAt,
		'update_at' => $updateAt,
    ];
});
