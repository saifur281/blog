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

            'role_id' => 1,
            'name' => 'Admin',
            'username' => 'admin',
            'email'   => 'admin@blog.com',
            'password' => bcrypt('admin123'),


        ]);

        DB::table('users')->insert([

            'role_id' => 2,
            'name' => 'Author',
            'username' => 'author',
            'email'   => 'author@blog.com',
            'password' => bcrypt('auth123'),


        ]);
    }
}
