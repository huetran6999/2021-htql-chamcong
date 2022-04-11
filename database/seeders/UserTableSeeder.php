<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Faker\Factory;
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
        $managerRole = Role::where('r_name', 'manager')->first();
        $userleaderRole = Role::where('r_name', 'userleader')->first();
        $salaryleaderRole = Role::where('r_name', 'salaryleader')->first();
        $employeeRole = Role::where('r_name', 'employee')->first();

        $manager = User::create([
            't_id' => '6',
            'p_id' => '1',
            'f_id' => '6',
            'l_id' => '5',
            'd_id' => '1',
            's_id' => '10',
            'u_name' => 'Manager',
            'u_phone' => '0777585696',
            'u_email' => 'manager@gmail.com',
            'username' => 'manager',
            'password' => bcrypt('123456'),
        ]);
        $userleader = User::create([
            't_id' => '2',
            'p_id' => '3',
            'f_id' => '6',
            'l_id' => '3',
            'd_id' => '7',
            's_id' => '7',
            'u_name' => 'User Leader',
            'u_phone' => '0777585695',
            'u_email' => 'userleader@gmail.com',
            'username' => 'userleader',
            'password' => bcrypt('123456'),
        ]);
        $salaryleader = User::create([
            't_id' => '7',
            'p_id' => '3',
            'f_id' => '6',
            'l_id' => '3',
            'd_id' => '4',
            's_id' => '7',
            'u_name' => 'Salary Leader',
            'u_phone' => '0777585697',
            'u_email' => 'salaryleader@gmail.com',
            'username' => 'salaryleader',
            'password' => bcrypt('123456'),
        ]);
        $employee = User::create([
            't_id' => '3',
            'p_id' => '6',
            'f_id' => '3',
            'l_id' => '4',
            'd_id' => '4',
            's_id' => '4',
            'u_name' => 'Employee',
            'u_phone' => '0777585699',
            'u_email' => 'employee@gmail.com',
            'username' => 'employee',
            'password' => bcrypt('123456'),
        ]);

        $manager->role()->attach($managerRole);
        $userleader->role()->attach($userleaderRole);
        $salaryleader->role()->attach($salaryleaderRole);
        $employee->role()->attach($employeeRole);

        


    }
}
