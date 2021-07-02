<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TipoProducto;

class TipoProductos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $clasificacion;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.tipoProductos.view', [
            'tipoProductos' => TipoProducto::latest()
						
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
		
		$this->clasificacion = null;
    }

    public function store()
    {
        $this->validate([
		
		'clasificacion' => 'required',
        ]);

        TipoProducto::create([ 
			
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
		
		$this->clasificacion = $record-> clasificacion;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		
		'clasificacion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = TipoProducto::find($this->selected_id);
            $record->update([ 
			
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
