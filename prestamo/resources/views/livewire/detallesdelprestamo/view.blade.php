<div class="container">
	<div class="alert colordark" role="alert">
		<div class="row">
			<div class="col-lg-10 col-md-10 col-sm-2">
				<div class="usuario-white">
					<b>Productos solicitado</b>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				@if (session()->has('message'))
				<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
				@endif
			</div>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Foto</th>
					<th scope="col">Fecha Entrega</th>
					<th scope="col">Fecha Devolucion</th>
					<th scope="col">Direccion</th>
					<th scope="col">Mensaje</th>
					<th scope="col">Solicitud</th>
					<th scope="col">Parentesco</th>
					<th scope="col">Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($productossolicitados as $row)
				<tr>
					<td width="90"><img class="card-img-top" src="{{ $row->foto }}"></td>
					<td>{{ $row->fecha_entrega }}</td>
					<td>{{ $row->fecha_devolucion }}</td>
					<td>{{ $row->direccion }}</td>
					<td>{{ $row->telefono }}</td>
					<td>{{ $row->celular }}</td>
					<td>{{ $row->parentesco }}</td>
					<td>
						<button type="button" wire:click.prevent="destroy({{ $row->id }})" class="btn btn-danger">Eliminar</button>
						<br>
						<button type="button" wire:click.prevent="acceptRequestLoan({{ $row->productoid }} , {{$row->id}})" class="btn btn-warning">@if( $row->celular==='Pendiente') Aceptar @else Terminar @endif</button>
						<br>
						<button type="button" action="{{ url('/productossolicitados') }}" method="post" class="btn btn-info">Informacion</button>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{ $productossolicitados->links() }}
	</div>
</div>