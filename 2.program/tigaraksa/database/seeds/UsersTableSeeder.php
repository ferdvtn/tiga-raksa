<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Administrator',
                'role' => 1,
                'email' => 'admin@email.id',
                'password' => bcrypt('admin123')
            ],
            [
                'name' => 'Ali',
                'role' => 0,
                'email' => 'ali@email.id',
                'password' => bcrypt('ali123')
            ]
        ]);
    }
}
