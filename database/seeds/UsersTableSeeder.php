<?php
use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Generator::class);

	    $avatars = [
		    'http://pbfa6u6aq.bkt.clouddn.com/image/user/avatar/aemooT8dae1Cobu.jpg',
		    'http://pbfa6u6aq.bkt.clouddn.com/image/user/avatar/Aiqueeyov7aiFaiy.jpg',
		    'http://pbfa6u6aq.bkt.clouddn.com/image/user/avatar/ga2zaiZ6tuo8eife.jpg',
		    'http://pbfa6u6aq.bkt.clouddn.com/image/user/avatar/aecah3Eo1shahchu.jpg',
		    'http://pbfa6u6aq.bkt.clouddn.com/image/user/avatar/Cae8ro9Reequae2x.jpg',
		    'http://pbfa6u6aq.bkt.clouddn.com/image/user/avatar/Eiyoo9ohthie9ahl.jpg',
		    'http://pbfa6u6aq.bkt.clouddn.com/image/user/avatar/DeiH5uo6ooTahRat.jpg',
		    'http://pbfa6u6aq.bkt.clouddn.com/image/user/avatar/oa0taiPhaeGhu7xi.jpg',
		    'http://pbfa6u6aq.bkt.clouddn.com/image/user/avatar/Tooz8meeha6gooVu.jpg',
		    'http://pbfa6u6aq.bkt.clouddn.com/image/user/avatar/phei9uceey1OhM7d.jpg',
		    'http://pbfa6u6aq.bkt.clouddn.com/image/user/avatar/Oorooyealai9dobo.jpg',
		    'http://pbfa6u6aq.bkt.clouddn.com/image/user/avatar/miegoh5Aibe4quai.jpg',
		    'http://pbfa6u6aq.bkt.clouddn.com/image/user/avatar/theXathiiseith6u.jpg',
		    'http://pbfa6u6aq.bkt.clouddn.com/image/user/avatar/chee8oBea2Bahw2y.jpg',
	    ];

	    $factory = factory(User::class)
	    ->times(15)
	    ->make()
	    ->each(function($user, $index) use ($faker, $avatars) {
		    // 从头像数组中随机取出一个值，并赋值给用户头像属性上。
		    $user->avatar = $faker->randomElement($avatars);
	    });

	    // 让隐藏字段可见，并将数据集合转换为数组。
	    $array = $factory->makeVisible(['password', 'remember_token'])->toArray();

	    // 将数据插入到用户数据表中。
	    User::insert($array);
//	    $user = User::find(1);
//	    $user->name = 'Laravel Framework';
//	    $user->email = 'laravel@gmail.com';
//	    $user->avatar = 'http://pbfa6u6aq.bkt.clouddn.com/image/user/avatar/Ji3ohCho5Quov5UL.jpg';
//	    $user->save();
    }
}
