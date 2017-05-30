<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('backs')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456')
        ]);
    }
}
