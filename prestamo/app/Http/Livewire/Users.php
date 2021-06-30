<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class Users extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $lastname, $tel, $email;
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
		'name' => 'required',
		'lastname' => 'required',
		'tel' => 'required',
		'email' => 'required',
        ]);

        User::create([ 
			'name' => $this-> name,
			'lastname' => $this-> lastname,
			'tel' => $this-> tel,
			'email' => $this-> email
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

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'lastname' => 'required',
		'tel' => 'required',
		'email' => 'required',
        ]);

        if ($this->selected_id) {
			$record = User::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'lastname' => $this-> lastname,
			'tel' => $this-> tel,
			'email' => $this-> email
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'User Successfully updated.');
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