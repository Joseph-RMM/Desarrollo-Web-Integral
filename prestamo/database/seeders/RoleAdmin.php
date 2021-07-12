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
        Permission::create(["name"=>'seller.home'])->assignRole($seller);
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
        
        //Permission::create(["name"=>'seller.home'])->assignRole($seller);

        Permission::create(["name"=>'seller.products.index'])->assignRole($seller);
        Permission::create(["name"=>'seller.products.create'])->assignRole($seller);
        Permission::create(["name"=>'seller.products.edit'])->assignRole($seller);
        Permission::create(["name"=>'seller.products.destroy'])->assignRole($seller);

        Permission::create(["name"=>'seller.productsd.index'])->assignRole($seller);
        Permission::create(["name"=>'seller.productsd.create'])->assignRole($seller);
        Permission::create(["name"=>'seller.productsd.edit'])->assignRole($seller);
        Permission::create(["name"=>'seller.productsd.destroy'])->assignRole($seller);

        Permission::create(["name"=>'seller.solicitudes.index'])->assignRole($seller);
        Permission::create(["name"=>'seller.solicitudes.create'])->assignRole($seller);
        Permission::create(["name"=>'seller.solicitudes.edit'])->assignRole($seller);
        Permission::create(["name"=>'seller.solicitudes.destroy'])->assignRole($seller);

        Permission::create(["name"=>'seller.productss.index'])->assignRole($seller);
        Permission::create(["name"=>'seller.productss.create'])->assignRole($seller);
        Permission::create(["name"=>'seller.productss.edit'])->assignRole($seller);
        Permission::create(["name"=>'seller.productss.destroy'])->assignRole($seller);


    }
}
