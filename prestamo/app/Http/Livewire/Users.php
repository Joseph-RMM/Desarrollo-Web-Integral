<?php

namespace App\Http\Livewire;

use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Http\Request;

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
    protected $messages = [
        'email.required' => 'The Email Address cannot be empty.',
        'email.email' => 'The Email Address format is not valid.',
    ];
    public function update()
    {
        $this->validate([
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'lastname' => ['required', 'string','min:3', 'max:51'],
            'tel' => ['required', 'digits:10'],
            'email' => ['required', 'string', 'email', 'unique:users', 'regex:/(.*)@(gmail|yahoo|outlook)\.com/i'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation'=> ['required', 'string', 'min:8','same:password'],
        ]);

        if ($this->selected_id) {
			$record = User::find($this->selected_id);
            $record->update([
			'name' => $this-> name,
			'lastname' => $this-> lastname,
			'tel' => $this-> tel,
			'email' => $this-> email
            ]);
           }
        else{
            $this->updateMode = false;
            session()->flash('message', 'Invalid Mail');
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
