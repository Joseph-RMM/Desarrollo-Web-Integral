@section('title', __('Productos'))




<div class="container">
    <div class="alert colordark" role="alert">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-1">
                <div class="usuario-white">
                    <b>Productos</b>
                </div>

            </div>
            <div class="col-lg-5 col-md-5 col-sm-1">
                @if (session()->has('message'))
                <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
                @endif
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2">
                <div class="usuario-white">
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-box-open"></i> </i> Agregar Productos</button>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        @include('livewire.productos.create')
        <table class="table table-hover">
            <thead>
                <tr>
                    <td>#</td>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Foto</th>
                    <th>Foto2</th>
                    <th>Foto3</th>
                    <th>Estado Actual Del Producto</th>
                    <th>Id Usuario</th>
                    <td>ACTIONS</td>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->nombre }}</td>
                    <td>{{ $row->Descripcion }}</td>
                    <td><img class="card-img-top" src="{{ $row->foto }}"></td>
                    <td><img class="card-img-top" src="{{ $row->foto2 }}"></td>
                    <td><img class="card-img-top" src="{{ $row->foto3 }}"></td>
                    <td>{{ $row->Estado_actual_del_producto }}</td>
                    <td>{{ $row->id_usuario }}</td>
                    <td>
                        <button onclick="confirm('Confirm Delete Producto id {{$row->id}}? \nDeleted Productos cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})" class="button-rojo button5"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>