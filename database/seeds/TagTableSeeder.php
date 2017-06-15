<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 100; $i++) {
            DB::table('tags')->insert([
                'name' => Str::random(4, 'abcdsjhjsdhjskkouidjksahdjsahdjksahdjskkljdsa')
            ]);
        }
    }
}
