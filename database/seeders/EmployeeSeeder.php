<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::insert([
            ['id' => 1, 'name' => 'Rendra', 'dob' => '2011-11-11', 'city' => 'Jogja', 'email' => 'rendragituloh@gmail.com', 'password' => md5('changeme'), 'created_at' => now()],
            ['id' => 2,'name' => 'Khariz', 'dob' => '2012-12-12', 'city' => 'Bantul', 'email' => 'Kharizajaah@gmail.com' , 'password' => md5('changeme'), 'created_at' => now()],
            ['id' => 3,'name' => 'Joko', 'dob' => '2010-10-10', 'city' => 'Sleman', 'email' => 'Jokoterdepan@gmail.com' , 'password' => md5('changeme'), 'created_at' => now()],
            ['id' => 4,'name' => 'Mariyam', 'dob' => '2009-09-09', 'city' => 'Gunung Kidul', 'email' => 'Maiyamyuk@gmail.com' , 'password' => md5('changeme'), 'created_at' => now()],
        ]);
    }
}
