<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BackTableSeeder::class);
        $this->call(ModuleTableSeeder::class);
    }
}
