<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'tipoProductos';

    protected $fillable = ['clasificacion'];
	
}
