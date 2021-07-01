<?php

namespace Database\Factories;

use App\Models\TipoProducto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TipoProductoFactory extends Factory
{
    protected $model = TipoProducto::class;

    public function definition()
    {
        return [
			'id_producto' => $this->faker->name,
			'clasificacion' => $this->faker->name,
        ];
    }
}
