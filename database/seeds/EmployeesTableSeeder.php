<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Db::table('employees')->insert([
            'name' => str_random(10),
            'surname' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'phone' => 123456789,
            'description' => str_random(20),
        ]);
    }
}
