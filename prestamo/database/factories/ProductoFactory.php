<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'categoria' => $this->faker->name,
			'Descripcion' => $this->faker->name,
			'foto' => 'fotos/'.$this->faker->image('public/storage/fotos',640,480,false),
			'Estado_actual_del_producto' => $this->faker->name,
			'id_usuario' => $this->faker->name,
            'id_tiposdeproductos' => $this->faker->name,
        ];
    }
}
