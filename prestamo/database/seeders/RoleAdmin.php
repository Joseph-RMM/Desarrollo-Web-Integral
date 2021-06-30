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

        Permission::create(["name"=>'admin.home']);
        Permission::create(["name"=>'admin.users.index']);
        Permission::create(["name"=>'admin.users.create']);
        Permission::create(["name"=>'admin.users.edit']);
        Permission::create(["name"=>'admin.users.destroy']);

        Permission::create(["name"=>'admin.products.index']);
        Permission::create(["name"=>'admin.products.create']);
        Permission::create(["name"=>'admin.products.edit']);
        Permission::create(["name"=>'admin.products.destroy']);

        Permission::create(["name"=>'admin.api.index']);
        Permission::create(["name"=>'admin.api.create']);
        Permission::create(["name"=>'admin.api.edit']);
        Permission::create(["name"=>'admin.api.destroy']);
    }
}
