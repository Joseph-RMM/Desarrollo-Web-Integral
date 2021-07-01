<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'tipo_productos';

    protected $fillable = ['clasificacion'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        //return $this->hasOne('App\Models\Producto', 'id', 'id_producto');
    }
    
}
