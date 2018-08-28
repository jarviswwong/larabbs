<?php

use Illuminate\Database\Seeder;
use App\Models\Topic;
use App\Models\User;
use App\Models\Category;

class TopicsTableSeeder extends Seeder
{
    public function run()
    {
        $user_ids = User::all()->pluck("id")->toArray();

        $category_ids = Category::all()->pluck("id")->toArray();

        $topic_title_map = [
            "https://ws3.sinaimg.cn/large/0069RVTdgy1fuo9zd9zlij31kw11xh5f.jpg",
            "http://cdn.imcavoy.com/larabbs/20180828130832_EKHap1_lUBX1coefhw.jpeg",
            "http://cdn.imcavoy.com/larabbs/20180828130834_rTqrC3_s59eRQuY7Ss.jpeg",
            "http://cdn.imcavoy.com/larabbs/20180828130833_j3RmEy_QOaSUDQSRcs.jpeg",
            "http://cdn.imcavoy.com/larabbs/20180828130833_BRIu8x_pSgD0876AD8.jpeg",
        ];

        $faker = app(Faker\Generator::class);

        $topics = factory(Topic::class)->times(100)->make()
            ->each(function ($topic, $index)
            use ($user_ids, $category_ids, $topic_title_map, $faker) {
                $topic->user_id = $faker->randomElement($user_ids);
                $topic->category_id = $faker->randomElement($category_ids);
                $topic->title_map = $faker->randomElement($topic_title_map);
            });

        Topic::insert($topics->toArray());
    }

}

