<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin  = Role::create(["name"=>"Admin"]);
        $seller = Role::create(["name"=>"Seller"]);

        Permission::create(["name"=>'admin.home'])->assignRole($admin);
        Permission::create(["name"=>'admin.users.index'])->assignRole($admin);
        Permission::create(["name"=>'admin.users.create'])->assignRole($admin);
        Permission::create(["name"=>'admin.users.edit'])->assignRole($admin);
        Permission::create(["name"=>'admin.users.destroy'])->assignRole($admin);
        //$permission->syncRoles([$role1,$role2]);

        Permission::create(["name"=>'admin.products.index'])->assignRole($admin);
        Permission::create(["name"=>'admin.products.create'])->assignRole($admin);
        Permission::create(["name"=>'admin.products.edit'])->assignRole($admin);
        Permission::create(["name"=>'admin.products.destroy'])->assignRole($admin);

        Permission::create(["name"=>'admin.api.index'])->assignRole($admin);
        Permission::create(["name"=>'admin.api.create'])->assignRole($admin);
        Permission::create(["name"=>'admin.api.edit'])->assignRole($admin);
        Permission::create(["name"=>'admin.api.destroy'])->assignRole($admin);


    }
}
