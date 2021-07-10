@section('title', __('Productossolicitados'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Productossolicitado Listing </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Productossolicitados">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
						<i class="fa fa-plus"></i>  Add Productossolicitados
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.productossolicitados.create')
						@include('livewire.productossolicitados.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Id Tiposdeproductos</th>
								<th>Fecha Entrega</th>
								<th>Fecha Devolucion</th>
								<th>Id Solicitud</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($productossolicitados as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->id_tiposdeproductos }}</td>
								<td>{{ $row->fecha_entrega }}</td>
								<td>{{ $row->fecha_devolucion }}</td>
								<td>{{ $row->id_solicitud }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Productossolicitado id {{$row->id}}? \nDeleted Productossolicitados cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $productossolicitados->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>