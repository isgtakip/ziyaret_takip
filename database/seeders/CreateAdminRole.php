<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //sonradan değiştirebiliyoruz 
         $role = Role::create(['guard_name' => 'sanctum','name' => 'Admin']);
         $permissions = Permission::pluck('id','id')->all();
         $role->syncPermissions($permissions);
    }
}
