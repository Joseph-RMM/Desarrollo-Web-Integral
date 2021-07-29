<?php

namespace App\Http\Livewire;

use App\Events\SolicitudesEvent;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Solicitude;
use App\Models\User;
use App\Notifications\solicitudesn;

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
		'Mensaje' => 'required|min:4',
		'status' => 'required',
		'id_usuario' => 'required|min:1',
		'id_usuariosolicitante' => 'required',
        ]);

        $Solicitude=Solicitude::create([ 
            
			'Mensaje' => $this-> Mensaje,
			'status' => $this-> status,
			'id_usuario' =>$this-> id_usuario,
			'id_usuariosolicitante' => $this-> id_usuariosolicitante,
            
        ]);
        //ESTA LINEA FUNCIONA
       ///auth()->user()->notify(new solicitudesn($Solicitude));

        //NOTIFICACION AL 100------------------------>NO BORRAR
       User::all()
        ->except($Solicitude->id)
        ->each(function(User $user) use ($Solicitude){
            $user->notify(new solicitudesn($Solicitude));
        });
       //event(new SolicitudesEvent($Solicitude));
        return redirect()->back()->with('message','Tines una solicitud de amistad');
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Solicitude Successfully created.');
        //NOTIFICACION AL 100------------------------> NO BORRAR
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
			'id_usuario' => $this-> id_usuario,
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
