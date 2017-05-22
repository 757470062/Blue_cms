<?php

use Illuminate\Database\Seeder;

class BacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Back\Back',3)->create([
            'password' => bcrypt('123456')
        ]);
    }
}
