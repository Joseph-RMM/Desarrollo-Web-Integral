<?php

namespace Database\Seeders;

use App\Models\Municipio;
use App\Models\Tiposdeproducto;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('fotos');
        Storage::makeDirectory('fotos');
        // \App\Models\User::factory(10)->create();
        $this->call(RoleAdmin::class);
        Municipio::create(['name'=>"Puebla"]);
        Tiposdeproducto::create(['clasificacion'=>"Electrodomesticos"]);
        User::create([
            'name'=>'equipo2',
            "lastname"=>"equipo2",
            "tel"=>"2225102004",
            "email"=>"equipo2@equipo.com",
            "password"=>Hash::make('equipo22'),
            "id_municipio"=>"1"
        ])->assignRole('Admin');
    }
}
