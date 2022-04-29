<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::query()->truncate();
        Role::Insert([
            ['name'=>'Admin'],
            ['name'=>'Super Admin'],
            ['name'=>'Employee'],
            ['name'=>'Hr Admin'],
        ]);
    }
}
