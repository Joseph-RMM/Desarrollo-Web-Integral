<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Validation\Validator;

class User extends Authenticatable
{
    use HasFactory;
    use HasRoles;

    public $timestamps = true;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'lastname',
        'tel',
        'email',
        'password'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany('App\Models\Producto', 'id_usuario', 'id');
    }

}
