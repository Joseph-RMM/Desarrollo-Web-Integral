<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Solicitude;
use App\Models\User;

class Solicitudes extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Mensaje, $status, $id_usuario, $id_usuariosolicitante;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.solicitudes.view', [
            'solicitudes' => Solicitude::latest()
						->orWhere('Mensaje', 'LIKE', $keyWord)
						->orWhere('status', 'LIKE', $keyWord)
						->orWhere('id_usuario', 'LIKE', $keyWord)
						->orWhere('id_usuariosolicitante', 'LIKE', $keyWord)
						->paginate(10),
            'users' => User::all()
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->Mensaje = null;
		$this->status = null;
		$this->id_usuario = null;
		$this->id_usuariosolicitante = null;
    }

    public function store()
    {
        $this->validate([
		'Mensaje' => 'required',
		'status' => 'required',
		'id_usuario' => 'required',
		'id_usuariosolicitante' => 'required',
        ]);

        Solicitude::create([ 
			'Mensaje' => $this-> Mensaje,
			'status' => $this-> status,
			'id_usuario' =>auth()->user()->id,
			'id_usuariosolicitante' => $this-> id_usuariosolicitante
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Solicitude Successfully created.');
    }

    public function edit($id)
    {
        $record = Solicitude::findOrFail($id);

        $this->selected_id = $id; 
		$this->Mensaje = $record-> Mensaje;
		$this->status = $record-> status;
		$this->id_usuario = $record-> id_usuario;
		$this->id_usuariosolicitante = $record-> id_usuariosolicitante;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'Mensaje' => 'required',
		'status' => 'required',
		'id_usuario' => 'required',
		'id_usuariosolicitante' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Solicitude::find($this->selected_id);
            $record->update([ 
			'Mensaje' => $this-> Mensaje,
			'status' => $this-> status,
			'id_usuario' => auth()->user()->id,
			'id_usuariosolicitante' => $this-> id_usuariosolicitante
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Solicitude Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Solicitude::where('id', $id);
            $record->delete();
        }
    }
}
