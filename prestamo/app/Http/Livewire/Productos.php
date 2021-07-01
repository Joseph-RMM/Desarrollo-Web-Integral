<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use WithFileUploads;

class Productos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $categoria, $Descripcion, $foto, $Estado_actual_del_producto, $id_usuario,$id_tipo_producto;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.productos.view', [
            'productos' => Producto::latest()
                        ->orWhere('nombre', 'LIKE', $keyWord)
                        ->orWhere('categoria', 'LIKE', $keyWord)
						->orWhere('Descripcion', 'LIKE', $keyWord)
						->orWhere('foto', 'LIKE', $keyWord)
						->orWhere('Estado_actual_del_producto', 'LIKE', $keyWord)
						->orWhere('id_usuario', 'LIKE', $keyWord)
                        ->orWhere('id_tipo_producto', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {	
        $this->nombre = null;
        $this->categoria = null;
		$this->Descripcion = null;
		$this->foto = null;
		$this->Estado_actual_del_producto = null;
		$this->id_usuario = null;
        $this->id_tipo_producto = null;
    }

    public function store()
    {
        $this->validate([
        'nombre' => 'required',
        'categoria' => 'required',    
		'Descripcion' => 'required',
		'foto' => 'required',
		'Estado_actual_del_producto' => 'required',
		'id_usuario' => 'required',
        'id_tipo_producto' => 'required'
        ]);

        Producto::create([ 
            'nombre' => $this-> nombre,
            'categoria' => $this-> categoria,
			'Descripcion' => $this-> Descripcion,
			'foto' => $this-> foto,
			'Estado_actual_del_producto' => $this-> Estado_actual_del_producto,
			'id_tipo_producto' => $this-> id_usuario
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Producto Successfully created.');
    }

    public function edit($id)
    {
        $record = Producto::findOrFail($id);

        $this->selected_id = $id; 
        $this->nombre = $record-> nombre;
        $this->categoria = $record-> categoria;
		$this->Descripcion = $record-> Descripcion;
		$this->foto = $record-> foto;
		$this->Estado_actual_del_producto = $record-> Estado_actual_del_producto;
		$this->id_usuario = $record-> id_usuario;
        $this->id_tipo_producto = $record-> id_tipo_producto;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
        'nombre' => 'required',
        'categoria' => 'required',
		'Descripcion' => 'required',
		'foto' => 'required',
		'Estado_actual_del_producto' => 'required',
		'id_usuario' => 'required',
        'id_tipo_producto' => 'required'
        ]);

        if ($this->selected_id) {
			$record = Producto::find($this->selected_id);
            $record->update([ 
            'nombre' => $this-> nombre,
            'categoria' => $this-> categoria,    
			'Descripcion' => $this-> Descripcion,
			'foto' => $this-> foto,
			'Estado_actual_del_producto' => $this-> Estado_actual_del_producto,
			'id_usuario' => $this-> id_usuario,
            'id_tipo_producto' => $this-> id_tipo_producto
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
            $record->delete();
        }
    }
}
