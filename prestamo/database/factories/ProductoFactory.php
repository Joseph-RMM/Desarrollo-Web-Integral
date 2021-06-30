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
			'Descripcion' => $this->faker->name,
			'foto' => $this->faker->name,
			'Estado_actual_del_producto' => $this->faker->name,
			'id_usuario' => $this->faker->name,
        ];
    }
}