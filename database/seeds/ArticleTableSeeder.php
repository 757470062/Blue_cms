<?php

use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i < 100000; $i++){
            DB::table('articles')->insert([
                'category_id' => 1,
                'title' => 'this is a title' . $i,
                'keys' => 'this is key',
                'flag_id' => '推荐',
                'user_id' => 1,
                'photo' => 'photodfsafsaf',
                'intro' => '发送卡后付款发货反馈',
                'content' => '发多少卡浩丰科技阿双方科技哈萨克金凤凰',
                'code' => 'fasjhfkjsafhjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkks',
                'clicks' => '20'.$i
            ]);
    }
    }
}
