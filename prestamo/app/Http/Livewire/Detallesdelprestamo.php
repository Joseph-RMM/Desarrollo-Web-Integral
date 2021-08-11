<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Productossolicitado;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class Detallesdelprestamo extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_tiposdeproductos, $fecha_entrega, $fecha_devolucion, $direccion, $telefono, $celular, $parentesco;
    public $updateMode = false;
	public $foto;
	public $Estado_actual_del_producto,$statusproduct;
    public function render()
    {
		
        return view('livewire.detallesdelprestamo.view', [
            'productossolicitados' => Productossolicitado::join('productos','productossolicitados.id_tiposdeproductos','=','productos.id')
						->Where('productos.id_usuario','=',auth()->user()->id)														
						->select('fecha_entrega','fecha_devolucion','direccion','telefono','celular','parentesco',
						'productossolicitados.id','foto','productos.id as productoid','Estado_actual_del_producto')
						->orderByDesc('productossolicitados.updated_at')
						->paginate(10),
        ]);
		/*$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.detallesdelprestamo.view', [
            'productossolicitados' => Productossolicitado::latest()
						->orWhere('id_tiposdeproductos', 'LIKE', $keyWord)
						->orWhere('fecha_entrega', 'LIKE', $keyWord)
						->orWhere('fecha_devolucion', 'LIKE', $keyWord)
						->orWhere('direccion', 'LIKE', $keyWord)
						->orWhere('telefono', 'LIKE', $keyWord)
						->orWhere('celular', 'LIKE', $keyWord)
						->orWhere('parentesco', 'LIKE', $keyWord)					
						->paginate(10),
        ]);*/
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
		$this->direccion = null;
		$this->telefono = null;
		$this->celular = null;
		$this->parentesco = null;
    }

    public function store()
    {
        $this->validate([
		'id_tiposdeproductos' => 'required',
		'fecha_entrega' => 'required',
		'fecha_devolucion' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
		'celular' => 'required',
		'parentesco' => 'required'
        ]);

        Productossolicitado::create([ 
			'id_tiposdeproductos' => $this-> id_tiposdeproductos,
			'fecha_entrega' => $this-> fecha_entrega,
			'fecha_devolucion' => $this-> fecha_devolucion,
			'direccion' => $this-> direccion,
			'telefono' => $this-> telefono,
			'celular' => $this-> celular,
			'parentesco' => $this-> parentesco,
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
		$this->direccion = $record-> direccion;
		$this->telefono = $record-> telefono;
		$this->celular = $record-> celular;
		$this->parentesco = $record-> parentesco;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_tiposdeproductos' => 'required',
		'fecha_entrega' => 'required',
		'fecha_devolucion' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
		'celular' => 'required',
		'parentesco' => 'required'
        ]);

        if ($this->selected_id) {
			$record = Productossolicitado::find($this->selected_id);
            $record->update([ 
			'id_tiposdeproductos' => $this-> id_tiposdeproductos,
			'fecha_entrega' => $this-> fecha_entrega,
			'fecha_devolucion' => $this-> fecha_devolucion,
			'direccion' => $this-> direccion,
			'telefono' => $this-> telefono,
			'celular' => $this-> celular,
			'parentesco' => $this-> parentesco
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
	public function acceptRequestLoan($idproduct,$idrequest){
		$record = Producto::findOrFail($idproduct);
		$recordtwo = Productossolicitado::findOrFail($idrequest);
		//celular es estado de la solicitud
		//$record = DB::table('productossolicitados')
		//->join('productos','productossolicitados.id_tiposdeproductos','=','productos.id')
		//->Where('productossolicitados.id','=',$id)															
		//->select('celular','Estado_actual_del_producto')->get();
		$pcolicitado=$recordtwo->celular;
		$this->Estado_actual_del_producto= $record->Estado_actual_del_producto;

		$this->updateMode = true;
		if($this->Estado_actual_del_producto==='D'){
        	$record->update([ 'Estado_actual_del_producto' => 'P']);
        	$recordtwo->update([ 'celular' => 'Aceptado']);
			$this->statusproduct=true;
			session()->flash('message', 'La solicitud ha sido Aceptada');
		}
		else if($this->Estado_actual_del_producto==='P' && $pcolicitado==='Aceptado')
		{
			$record->update([ 'Estado_actual_del_producto' => 'D']);
			$recordtwo->update(['celular'=>'Pendiente']);
			$this->statusproduct=false;
			session()->flash('message', 'Has terminado el prestamo');
		}else{
			session()->flash('message', 'El producto ya se encuentra prestado');
		}
		$this->updateMode = false;       
		$this->resetInput();    	       
	}
	public function action($id){

	}
}
