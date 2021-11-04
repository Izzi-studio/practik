<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'name' => Str::random(5),
        ]);

        DB::table('states')->insert([
            'name' => Str::random(5),
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
