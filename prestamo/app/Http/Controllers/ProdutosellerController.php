<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productoseller;
use App\Models\Producto;
use App\Models\User;
use App\Models\Tiposdeproducto;
use Illuminate\Support\Facades\Storage;

class ProdutosellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productos=Producto::all();
        return view('livewire.productossellers.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('livewire.productossellers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produ=new Producto;
        $produ->nombre = $request->input('nombre');
		$produ->Descripcion = $request->input('Descripcion');
        $produ->foto1 = $request->input('foto');
        $produ->foto2 = $request->input('foto2');
        $produ->foto3 = $request->input('foto3');
		$produ->Estado_actual_del_producto = $request->input('Estado_actual_del_producto');
		$produ->id_usuario = $request->input('id_usuario');
        $produ->id_tiposdeproductos = $request->input('id_tiposdeproductos'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
