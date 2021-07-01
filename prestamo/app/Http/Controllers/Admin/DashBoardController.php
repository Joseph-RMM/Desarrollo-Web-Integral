<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
