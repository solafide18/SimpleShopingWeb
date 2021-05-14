<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->truncate();
        $users = [
            'name' => "Administrator",
            'email' => "admin@mail.com",
            'password' => bcrypt('admin'),
        ];
        DB::table('users')->insert($users);
    }
}
