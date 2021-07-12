<?php

namespace App\Http\Livewire;

use Dotenv\Exception\ValidationException;
use http\Client\Request;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Municipio;
use App\Models\RegisterController;
use Livewire\Livewire;

class Users extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $lastname, $tel, $email,$password,$password_confirmation;
    public $Muni, $cbox2, $MucipioAnterior;
    public $updateMode = false;
    //public $Municipal,$Municipio;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.users.view', [
            'users' => User::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('lastname', 'LIKE', $keyWord)
						->orWhere('tel', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->paginate(10),
            'Municipal'=>Municipio::all()
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->name = null;
		$this->lastname = null;
		$this->tel = null;
		$this->email = null;
        $this->MucipioAnterior=null;
    }


    public function store()
    {
        $this->validate([
            'name' => ['required','string','min:3','max:50'],
            'lastname' => ['required','string','min:3','max:51'],
            'tel' => ['required','digits:10'],
            'email' => ['required','string','email','unique:users','regex:/(.*)@(live|gmail|yahoo|hotmail|outlook)\.com/i'],
            'password' => ['required','string','min:8'],
            'password_confirmation'=> ['required','string','min:8','same:password'],
            'Muni'=>['required','numeric','min:1']
        ]);

        User::create([
			'name' => $this-> name,
			'lastname' => $this-> lastname,
			'tel' => $this-> tel,
			'email' => $this-> email,
            'password' =>Hash::make( $this-> password),
            'id_municipio' => $this-> Muni
        ])->assignRole('Seller');

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Se ha creado un nuevo Usuario.');
    }


    public function edit($id)
    {
        $record = User::findOrFail($id);
        $this->selected_id = $id;
		$this->name = $record-> name;
		$this->lastname = $record-> lastname;
		$this->tel = $record-> tel;
		$this->email = $record-> email;
        $this->Muni=$record-> id_municipio;
        $this->updateMode = true;
    }



    public function updates()
    {
        $this->validate([
        'name' => ['required','string','min:3','max:50'],
        'lastname' => ['required','string','min:3','max:51'],
        'tel' => ['required','digits:10'],
        'Muni'=>['required','numeric','min:1']
        ]);

        $record = User::findOrFail($this->selected_id);
        if($record->email!==$this-> email) {
            $this->validate([
                'email' => ['required','min:10','email','unique:users','regex:/(.*)@(live|gmail|yahoo|hotmail|outlook)\.com/i']
            ]);
        }
        if ($this->selected_id) {
            $record->update([
                'name' => $this->name,
                'lastname' => $this->lastname,
                'tel' => $this->tel,
                'email' => $this->email,
                'id_municipio' => $this-> Muni
            ]);
            $this->resetInput();
            $this->modal = false;
            $this->updateMode = false;
            $this->emit('closeModalUpdate');
            session()->flash('message', 'Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = User::where('id', $id);
            $record->delete();
        }
    }
}
