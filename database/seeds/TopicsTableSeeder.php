<?php

use Illuminate\Database\Seeder;
use \App\Models\Topic;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //所有用户的idArr
	    $userIds = \App\Models\User::all()->pluck('id')->toArray();

	    //分类
	    $categoryIds = \App\Models\Category::all()->pluck('id')->toArray();

	    /** @var \Faker\Generator $faker */
	    $faker = app(\Faker\Generator::class);

	    /** @var \Illuminate\Database\Eloquent\FactoryBuilder $factory */
	    $factory = factory(Topic::class)
	        ->times(100)
		    ->make()
		    ->each(function ($topic, $index) use ($faker, $userIds, $categoryIds) {
			    $topic->user_id = $faker->randomElement($userIds);
			    $topic->category_id = $faker->randomElement($categoryIds);
			    $topic->last_reply_user_id = $topic->user_id;
		    });

	    $array = $factory->toArray();
	    \App\Models\Topic::insert($array);
    }
}
