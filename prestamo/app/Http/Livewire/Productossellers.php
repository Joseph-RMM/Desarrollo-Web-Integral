<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Models\Producto;
use App\Models\Tiposdeproducto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;
use \Illuminate\Http\Request;
use App\Models\User;

class Productossellers extends Component
{
	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $Descripcion,$foto1, $foto2, $foto3, $Estado_actual_del_producto, $id_usuario,$id_tiposdeproductos;
    public $foto;
    public $updateMode = false;
    public $selectedtiposdeproductos=null;
    public $tipos_deproductos=null;
    public $usuario=null;
    use WithPagination;
    use WithFileUploads;

    public function upload(){
        //dd('Rad');=

        $validatedData=$this->validate([
            'foto' => 'image|max:1024'
        ]);


        $foto=$this->foto->store('foto','public');
        $validatedData['foto']=$foto;
        Producto::create($validatedData);
        $this->emit('fotosubida');
		session()->flash('message', 'no estoy funcionando');
    }

    public function render()
    {

        //consulta para mostar la lista de produstos ordenados disponibles
        $productos=Producto::where("Estado_actual_del_producto","=","D")->orderByDesc('id')->get();
        
                
        //return view('livewire.productossellers.index', compact('productos'));
        
        return view('livewire.productossellers.view',compact('productos'));

    }
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
        $this->selected_id = null;
        $this->nombre = null;
		$this->Descripcion = null;
		$this->foto = null;
        $this->foto1 = null;
        $this->foto2 = null;
        $this->foto3 = null;
		$this->Estado_actual_del_producto = null;
		$this->id_usuario = null;
        $this->id_tiposdeproductos = null;        
    }

    public function store(Request $request)
    {
        //if($request->hasFile('foto')){
           // $path = $request->image->store('public');
          //  Image::create(['path'=>$path]);
            //$product['foto']=$request->file(key:'foto')->store(path:'fotos');
        //}
        $this->validate([
            'nombre' => 'required|min:4',
            'Descripcion' => 'required|min:20',
            'foto.*' => 'image|max:1024',
            'foto' => 'min:3|max:3',
            'Estado_actual_del_producto' => 'required',
            'id_tiposdeproductos' => 'required',


        ]);

        $urlclean = [];
        $inde = 0;
        foreach ($this->foto as $fotoname) {
            $namefoto = $fotoname->store('foto', 'public');
            $urlclean[$inde++] = Storage::url($namefoto);
        }
        //$urlclean=Storage::url($namefoto);
        Producto::create([
            'nombre' => $this->nombre,
            'Descripcion' => $this->Descripcion,
            'Estado_actual_del_producto' => $this->Estado_actual_del_producto,
            'foto' => $urlclean[0],
            'foto2' => $urlclean[1],
            'foto3' => $urlclean[2],
            'id_usuario' => auth()->user()->id,
            'id_tiposdeproductos' => $this->id_tiposdeproductos,


        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Producto Successfully created.');
    }

    public function edit($id)
    {
        //$record = Producto::findOrFail($id);
        $record = Producto::join('tiposdeproductos','productos.id_tiposdeproductos','=','tiposdeproductos.id')
        ->where('productos.id','=',$id)
        ->get();
        $this->selected_id = $id;
        $this->nombre = $record[0]-> nombre;
		$this->Descripcion = $record[0]-> Descripcion;
		$this->foto1 = $record[0]-> foto;
        $this->foto2 = $record[0]-> foto2;
        $this->foto3 = $record[0]-> foto3;
		$this->Estado_actual_del_producto = $record[0]-> Estado_actual_del_producto;
		$this->id_usuario = $record[0]-> id_usuario;
        $this->id_tiposdeproductos = $record[0]-> clasificacion;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
        'nombre' => 'required',
		'Descripcion' => 'required',
		'foto' => 'required',
		'Estado_actual_del_producto' => 'required',
		'id_usuario' => 'required',
        'id_tiposdeproductos' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Producto::find($this->selected_id);
            $record->update([
            'nombre' => $this-> nombre,
			'Descripcion' => $this-> Descripcion,
			'foto' => $this-> foto,
			'Estado_actual_del_producto' => $this-> Estado_actual_del_producto,
			'id_usuario' => $this-> id_usuario,
            'id_tiposdeproductos' => $this-> id_tiposdeproductos,
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Producto Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Producto::where('id', $id);
            if($record!=null){
            Storage::delete([
                Str::replaceArray("storage",["public"],$this->foto1),
                Str::replaceArray("storage",["public"],$this->foto2),
                Str::replaceArray("storage",["public"],$this->foto3)]);
            $record->delete();
            $this->emit('closeupdateModal');
            }
        }
    }
}
