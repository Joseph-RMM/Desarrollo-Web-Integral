<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Productossolicitado;

class Productossolicitados extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_tiposdeproductos, $fecha_entrega, $fecha_devolucion, $id_solicitud;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.productossolicitados.view', [
            'productossolicitados' => Productossolicitado::latest()
						->orWhere('id_tiposdeproductos', 'LIKE', $keyWord)
						->orWhere('fecha_entrega', 'LIKE', $keyWord)
						->orWhere('fecha_devolucion', 'LIKE', $keyWord)
						->orWhere('id_solicitud', 'LIKE', $keyWord)
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
		$this->id_tiposdeproductos = null;
		$this->fecha_entrega = null;
		$this->fecha_devolucion = null;
		$this->id_solicitud = null;
    }

    public function store()
    {
        $this->validate([
		'id_tiposdeproductos' => 'required|min:1|numeric',
		'fecha_entrega' => 'required|date',
		'fecha_devolucion' => 'required|date',
		'id_solicitud' => 'required|min:1|numeric',
        ]);

        Productossolicitado::create([ 
			'id_tiposdeproductos' => $this-> id_tiposdeproductos,
			'fecha_entrega' => $this-> fecha_entrega,
			'fecha_devolucion' => $this-> fecha_devolucion,
			'id_solicitud' => $this-> id_solicitud
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Productossolicitado Successfully created.');
    }

    public function edit($id)
    {
        $record = Productossolicitado::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_tiposdeproductos = $record-> id_tiposdeproductos;
		$this->fecha_entrega = $record-> fecha_entrega;
		$this->fecha_devolucion = $record-> fecha_devolucion;
		$this->id_solicitud = $record-> id_solicitud;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_tiposdeproductos' => 'required',
		'fecha_entrega' => 'required',
		'fecha_devolucion' => 'required',
		'id_solicitud' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Productossolicitado::find($this->selected_id);
            $record->update([ 
			'id_tiposdeproductos' => $this-> id_tiposdeproductos,
			'fecha_entrega' => $this-> fecha_entrega,
			'fecha_devolucion' => $this-> fecha_devolucion,
			'id_solicitud' => $this-> id_solicitud
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Productossolicitado Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Productossolicitado::where('id', $id);
            $record->delete();
        }
    }
}
