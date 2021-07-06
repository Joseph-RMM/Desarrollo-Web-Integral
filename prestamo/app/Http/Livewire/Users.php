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

class Users extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $lastname, $tel, $email,$password,$password_confirmation;
    public $updateMode = false;


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
    }


    public function store()
    {
        $this->validate([
            'name' => ['required','string','min:3','max:50'],
            'lastname' => ['required','string','min:3','max:51'],
            'tel' => ['required','digits:10'],
            'email' => ['required','string','email','unique:users','regex:/(.*)@(gmail|yahoo|outlook)\.com/i'],
            'password' => ['required','string','min:8'],
            'password_confirmation'=> ['required','string','min:8','same:password']
        ]);

        User::create([
			'name' => $this-> name,
			'lastname' => $this-> lastname,
			'tel' => $this-> tel,
			'email' => $this-> email,
            'password' =>Hash::make( $this-> password)
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'User Successfully created.');
    }

    public function edit($id)
    {
        $record = User::findOrFail($id);
        $this->selected_id = $id;
		$this->name = $record-> name;
		$this->lastname = $record-> lastname;
		$this->tel = $record-> tel;
		$this->email = $record-> email;
        $this->updateMode = true;
    }

    public function messages()
    {
        return [
            'email.unique' => 'Sube tres imagenes solamente',
            'email.max' => 'Sube tres imagenes solamente',
        ];
    }

    public function updates()
    {
        $this->validate([
        'name' => ['required','string','min:3','max:50'],
        'lastname' => ['required','string','min:3','max:51'],
        'tel' => ['required','digits:10']
        ]);
        $record = User::findOrFail($this->selected_id);
        if($record->email!==$this-> email) {
            $this->validate([
                'email' => ['required','min:10','email','unique:users','regex:/(.*)@(gmail|yahoo|outlook)\.com/i']
            ]);
        }
        if ($this->selected_id) {
            $record->update([
                'name' => $this->name,
                'lastname' => $this->lastname,
                'tel' => $this->tel,
                'email' => $this->email
            ]);
        } else {
            $this->updateMode = true;
            session()->flash('message', 'El usuario no se pudo editar');
            $this->resetInputFields();
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
