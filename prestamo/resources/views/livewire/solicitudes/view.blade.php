@section('title', __('Solicitudes'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<div class="container-fluid">
								@if(session('message'))
								<div class="row mb-2">
									<div class="col-lg-12">
										<div class="alert-danger">
										{{session('message')}}
										</div>
									</div>
								</div>
								@endif
							</div>
							<h3>Mis solicitudes de amistad y amigos</h3>
							<h5>A = Aceptado</h5>
							<h5>P = Pendiente</h5>
						</div>
						
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif


					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.solicitudes.create')
						@include('livewire.solicitudes.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<th>Nombre</th>
								<th>Mensaje</th>
								<th>Status</th>
								
								
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($solicitudes as $row)
							<tr>
								<td>{{ $row->name }}</td>
								<td>{{ $row->Mensaje }}</td>
								<td>{{ $row->status }}</td>
								
								
								<td width="90">
								<div class="btn-group">

									
									<a class="btn btn-success" wire:click="edit({{$row->id}})"  wire:click.prevent="update()"><i class="fa fa-edit"></i> Aceptar</a>							 
									<a class="btn btn-danger" onclick="confirm('Confirm Delete Solicitude id {{$row->id}}? \nDeleted Solicitudes cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>   
									
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $solicitudes->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>