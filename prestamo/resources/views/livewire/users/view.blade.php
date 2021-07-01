@section('title', __('Users'))

<br><br>
<div class="container">
	<div class="alert colordark" role="alert">
		<div class="row">
			<div class="col-lg-10 col-md-10 col-sm-2">
				<div class="usuario-white">
					<b>Usuarios</b>
				</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2">
				<div class="usuario-white">
					<a class="btn btn-primary btn-sm" href="{{ url('/create') }}" role="button"> <i class="fas fa-user"></i> Agregar usuario</a>
				</div>
			</div>
		</div>
	</div>

	<div class="table-responsive">
					
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre</th>
					<th scope="col">Apellido Materno</th>
					<th scope="col">Telefono</th>
					<th scope="col">Correo</th>
					<th scope="col">Acción</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $row)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $row->name }}</td>
					<td>{{ $row->lastname }}</td>
					<td>{{ $row->tel }}</td>
					<td>{{ $row->email }}</td>
					<td>
					    
						<a onclick="confirm('Confirm Delete User id {{$row->id}}? \nDeleted Users cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"> <button type="submit" class="button-rojo button5"><i class="fas fa-trash-alt"></i></button></a>
						<a href="{{ url('/update') }}"><button type="submit" class="button-verde button5"><i class="fas fa-pencil-alt"></i></button></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>