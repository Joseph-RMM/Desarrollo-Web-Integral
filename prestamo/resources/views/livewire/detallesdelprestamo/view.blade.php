@section('title', __('Productossolicitados'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4>
							Productos solicitado  </h4>
						</div>

						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						{{--<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Productossolicitados">
						</div>--}}
					</div>
				</div>
				@include('livewire.detallesdelprestamo.detailsmodal')
				<div class="card-body">

				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 								
								<th>Foto</th>
								<th>Fecha Entrega</th>
								<th>Fecha Devolucion</th>
								<th>Nombre Usuario</th>
								<th>Direccion</th>
								<th>Mensaje</th>
								<th>Solicitud</th>
								<th>Parentesco</th>							
								<td>Acciones</td>
							</tr>
						</thead>
						<tbody>
							@foreach($productossolicitados as $row)
							<tr>								
								<td width="90"><img class="card-img-top" src="{{ $row->foto }}"></td>
								<td>{{ $row->fecha_entrega }}</td>
								<td>{{ $row->fecha_devolucion }}</td>
								<td>{{ $row->name }}</td>
								<td>{{ $row->direccion }}</td>
								<td>{{ $row->telefono }}</td>
								<td>{{ $row->celular }}</td>
								<td>{{ $row->parentesco }}</td>
								
								<td width="90">
								
								<button type="button" wire:click.prevent="destroy({{ $row->id }})" class="btn btn-danger">Eliminar</button>
								<br>
								<button type="button" wire:click.prevent="acceptRequestLoan({{ $row->productoid }} , {{$row->id}})" class="btn btn-warning">@if( $row->celular==='Pendiente') Aceptar @else Terminar @endif</button>
								<br>												 
								<button wire:click.prevent="edit({{ $row->id }})" data-dismiss="modal" data-toggle="modal" data-target="#SendRequestModal" class="btn btn-info" >Informacion</button>               														
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $productossolicitados->links() }}
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				@if (session()->has('message'))
				<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
				@endif
			</div>
		</div>
	</div>
</div>
