<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::query()->truncate();
        Permission::Insert([
            ['name'=>'read'],
            ['name'=>'write'],
            ['name'=>'delete'],
        ]);
    }
}
