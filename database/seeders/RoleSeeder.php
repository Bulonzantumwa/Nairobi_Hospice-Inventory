<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'super_admin']);
        $role = Role::create(['name' => 'head_of_department']);
        $role = Role::create(['name' => 'finance_officer']);
        $role = Role::create(['name' => 'chief_executive_officer']);
    }
}
