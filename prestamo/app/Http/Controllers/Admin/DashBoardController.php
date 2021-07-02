<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Tiposdeproducto;
use App\Models\User;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index(){
        $UserRegister=User::count();
        return view('Admin.index',[
            "UserRegister"=>$UserRegister
        ]);
    }
    //return $user->toJson();
    public function graficdonut(){
        $categories=Tiposdeproducto::all('clasificacion');
                    Producto::count();
        return $categories;
    }
}
