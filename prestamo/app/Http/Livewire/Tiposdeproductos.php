<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tiposdeproducto;


class Tiposdeproductos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $clasificacion;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.tiposdeproductos.view', [
            'tiposdeproductos' => Tiposdeproducto::latest()
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

        Tiposdeproducto::create([ 
			'clasificacion' => $this-> clasificacion
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Tiposdeproducto Successfully created.');
    }

    public function edit($id)
    {
        $record = Tiposdeproducto::findOrFail($id);

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
			$record = Tiposdeproducto::find($this->selected_id);
            $record->update([ 
			'clasificacion' => $this-> clasificacion
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Tiposdeproducto Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Tiposdeproducto::where('id', $id);
            $record->delete();
        }
    }
}
