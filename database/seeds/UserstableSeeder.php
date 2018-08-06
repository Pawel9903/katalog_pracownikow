<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Db::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@wp.pl',
            'password' => bcrypt('admin'),
            'admin' => 1,
        ]);
        Db::table('users')->insert([
            'name' => 'Jan',
            'email' => 'jan@wp.pl',
            'password' => bcrypt('jan123'),
            'admin' => 0,
        ]);
        Db::table('users')->insert([
            'name' => 'Adam',
            'email' => 'adam@wp.pl',
            'password' => bcrypt('qwerty'),
            'admin' => 0,
        ]);
        Db::table('users')->insert([
            'name' => 'admin2',
            'email' => 'admin2@wp.pl',
            'password' => bcrypt('admin2'),
            'admin' => 1,
        ]);
    }
}
