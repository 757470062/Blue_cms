<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([
            'name' => '文档',
            'list' => 'article.list',
            'article' => 'article.article',
            'cover' => 'article.cover'
        ]);
        DB::table('modules')->insert([
            'name' => '图集',
            'list' => 'picture.list',
            'article' => 'picture.article',
            'cover' => 'picture.cover'
        ]);
        DB::table('modules')->insert([
            'name' => '视频',
            'list' => 'vidio.list',
            'article' => 'vidio.article',
            'cover' => 'vidio.cover'
        ]);
        DB::table('modules')->insert([
            'name' => '音频',
            'list' => 'audio.list',
            'article' => 'audio.article',
            'cover' => 'audio.cover'
        ]);
        DB::table('modules')->insert([
            'name' => '资料',
            'list' => 'download.list',
            'article' => 'download.article',
            'cover' => 'download.cover'
        ]);
        DB::table('modules')->insert([
            'name' => '问答',
            'list' => 'question.list',
            'article' => 'question.article',
            'cover' => 'question.cover',
        ]);
    }
}
