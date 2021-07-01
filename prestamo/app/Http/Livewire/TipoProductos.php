<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TipoProducto;

class TipoProductos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_producto, $clasificacion;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.tipo-productos.view', [
            'tipoProductos' => TipoProducto::latest()
						->orWhere('id_producto', 'LIKE', $keyWord)
						->orWhere('clasificacion', 'LIKE', $keyWord)
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
		$this->id_producto = null;
		$this->clasificacion = null;
    }

    public function store()
    {
        $this->validate([
		'id_producto' => 'required',
		'clasificacion' => 'required',
        ]);

        TipoProducto::create([ 
			'id_producto' => $this-> id_producto,
			'clasificacion' => $this-> clasificacion
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'TipoProducto Successfully created.');
    }

    public function edit($id)
    {
        $record = TipoProducto::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_producto = $record-> id_producto;
		$this->clasificacion = $record-> clasificacion;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_producto' => 'required',
		'clasificacion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = TipoProducto::find($this->selected_id);
            $record->update([ 
			'id_producto' => $this-> id_producto,
			'clasificacion' => $this-> clasificacion
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'TipoProducto Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = TipoProducto::where('id', $id);
            $record->delete();
        }
    }
}
