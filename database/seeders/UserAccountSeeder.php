<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserAccount;

class UserAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserAccount::insert([
            ['id' => 1, 'employee_id' => 1, 'create_date' => '2012-12-12', 'status' => 'active'],
            ['id' => 2, 'employee_id' => 2, 'create_date' => '2012-12-12', 'status' => 'active'],
            ['id' => 3,'employee_id' => 3, 'create_date' => '2012-12-12', 'status' => 'active'],
            ['id' => 4, 'employee_id' => 4, 'create_date' => '2012-12-12', 'status' => 'active'],
        ]);
    }
}
