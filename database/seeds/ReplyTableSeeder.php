<?php

use Illuminate\Database\Seeder;

class ReplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIds = \App\Models\User::all()->pluck('id')->toArray();
        $topicIds = \App\Models\Topic::all()->pluck('id')->toArray();

        $faker = app(\Faker\Generator::class);

        $factory = factory(\App\Models\Reply::class)
        ->times(1000)
        ->make()
        ->each(function ($reply, $index) use ($userIds, $topicIds, $faker) {
            $reply->user_id = $faker->randomElement($userIds);
            $reply->topic_id = $faker->randomElement($topicIds);
        });

        $array = $factory->toArray();
        \App\Models\Reply::insert($array);
    }
}
