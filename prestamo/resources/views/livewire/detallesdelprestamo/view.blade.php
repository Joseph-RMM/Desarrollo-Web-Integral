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
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Productossolicitados">
						</div>
>
					</div>
				</div>
				
				<div class="card-body">

				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Id Productossolicitado</th>
								<th>Fecha Entrega</th>
								<th>Fecha Devolucion</th>
								
								<th>Telefono</th>
								<th>Celular</th>
								<th>Parentesco</th>
								
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
								
								<td>{{ $row->telefono }}</td>
								<td>{{ $row->celular }}</td>
								<td>{{ $row->parentesco }}</td>
								
								<td width="90">
								<div class="btn-group">							 
									<a  class="btn btn-danger"  onclick="confirm('Confirm Delete Productossolicitado id {{$row->id}}? \nDeleted Productossolicitados cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Cancelar </a>   
									<a  class="btn btn-success" href="{{url('/detallesdelproducto')}}"> Aceptar </a>	
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