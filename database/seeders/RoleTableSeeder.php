<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::create(['r_name'=>'manager']);
        Role::create(['r_name'=>'userleader']);
        Role::create(['r_name'=>'salaryleader']);
        Role::create(['r_name'=>'employee']);
    }
}
