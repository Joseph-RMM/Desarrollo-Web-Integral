<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Producto extends Model
{
	use HasFactory;
    use HasRoles;

    public $timestamps = true;

    protected $table = 'productos';

    protected $fillable = ['nombre','categoria','Descripcion','foto','Estado_actual_del_producto','id_usuario','id_tipo_producto'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_usuario');
        return $this->hasOne('App\Models\TipoProductos', 'id', 'id_tipo_producto');
    }

}
