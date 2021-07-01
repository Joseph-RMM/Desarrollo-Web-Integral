@section('title', __('Productos'))

<div class="container">

    <div class="alert colordark" role="alert">
        <div class="row">
            <div class="col-lg-9 col-md-6 col-sm-2">
                <div class="usuario-white">
                    <b>Productos</b>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- -->
</div>

<div class="container">
    <h5><b class="negro">Más productos:</b></h5>
</div>

<div class="container contenedor">
    <center>
        <div class="row">
            @foreach($productos as $row)
            <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
                <div class="card cards" style="width: 18rem;">
                    <img class="card-img-top" src="{{ $row->foto }}">
                    <div class="card-body contenido">
                        <h5 class="card-title">{{ $row->nombre }}</h5>
                        <a class="verproducto" data-toggle="modal" data-target="#bd-example-modal-lg">ver
                            producto</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </center>
</div>




<!--DISEÑO MODAL-->

<div class="modal fade bd-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            @foreach($productos as $row)

            <div class="modal-header mx">
                <h5 class="modal-title" id="exampleModalLabel">{{ $row->nombre }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>

                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100 modalimg" src="{{ $row->foto }}" alt="First slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only negro">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only negro">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $row->Descripcion }} </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="dropdown-item" onclick="confirm('Confirm Delete Producto id {{$row->id}}? \nDeleted Productos cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})">  <button type="button" class="btn-eliminar btn btn-secondary">Eliminar</button> </a>
            </div>
            @endforeach
        </div>
    </div>
</div>