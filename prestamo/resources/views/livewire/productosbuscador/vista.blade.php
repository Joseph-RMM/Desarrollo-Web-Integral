<div wire:ignore.self class="modal fade bd-example-modal-lg" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header mx">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="rojo" aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100 modalimg" src="{{$foto1}}" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100 modalimg" src="{{$foto2}}" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100 modalimg" src="{{$foto3}}" alt="Third slide">
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
                        <h3 class="muynegro">Nombre</h3>
                        <h4 class="paraeltitulo"><u>{{ $nombre }}</u></h4>
                        <div class="row">
                            <div class="col-sm">
                                <label class="muynegro"> Categoria </label>
                                <p class="paraeltitulo">{{$id_tiposdeproductos}} </p>
                            </div>
                            <div class="col-sm"></div>
                            <div class="col-sm">
                                <label class="muynegro"> Estado </label>
                                <p class="verduras">{{$Estado_actual_del_producto}} </p>
                            </div>
                        </div>
                        <label class="muynegro">Descripcion</label>
                        <p class="paraeltitulo"><u>{{ $Descripcion }}</u></p><br>

                        <button wire:click="sendFriendRequest({{$selected_id}})" {{ $desabilitar ? "disabled": ""}} class="btn btn-{{$colorbutton}}"><i class="fas fa-user-friends"></i>{{ $requestmessage }}</button>
                        <style>.preloader {
                                  width: 30px;
                                  height: 30px;
                                  border: 5px solid #eee;
                                  border-top: 5px solid #666;
                                  border-radius: 50%;
                                  animation-name: girar;
                                  animation-duration: 2s;
                                  animation-iteration-count: infinite;
                                }
                                @keyframes girar {
                                  from {
                                    transform: rotate(0deg);
                                  }
                                  to {
                                    transform: rotate(360deg);
                                  }
                                }
                        </style>
                        <div wire:loading class="preloader">                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button data-toggle="modal" data-target="#exampleModal" class="button-rojo button5" {{ $disableform ? "disabled":"" }}>Solicitar</button>
                
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header mx">
                <h5 class="modal-title" id="exampleModalLabel">Por favor llena los siguientes campos : </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <label class="negro"> <strong>Direccion: </strong></label>
                        <br>
                        <input wire:model="direccion" class="form-control" type="text" id="direccion">@error('direccion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div> 
                    <div class="col-md-4">
                        <label class="negro"> <strong>Nùmero celular:: </strong></label>
                        <br>
                        <input wire:model="celular" class="form-control" type="tel" id="celular">@error('celular') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-8">
                        <br>
                        <label class="negro"> <strong>Mensaje de prestamo </strong></label>
                        <br>
                        <input wire:model="telefono" class="form-control" type="text" id="telefono">@error('telefono') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4">
                        <br>
                        <label class="negro"> <strong>Parentesco familiar: </strong></label>
                        <br>
                        <input wire:model="parentesco" class="form-control" type="text" id="parentesco">@error('parentesco') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-6">
                    <br> <br>
                        <label class="negro"> <strong>Fecha de entrega: </strong></label>
                        <br>
                        <input wire:model="fecha_entrega" class="form-control" type="date"  id="fecha_entrega">@error('fecha_entrega') <span class="error text-danger">{{ $message }}</span> @enderror
                        <br>
                    </div>
                    <div class="col-md-6">
                    <br> <br>
                        <label class="negro"> <strong>Fecha para devolver: </strong></label>
                        <br>
                        <input wire:model="fecha_devolucion" class="form-control" type="date" id="fecha_devolucion">@error('fecha_devolucion') <span class="error text-danger">{{ $message }}</span> @enderror
                        <br>
                    </div>
                    <div class="col-md-9">

                    </div>
                </div>
            </div>
            <div wire:loading class="preloader">                        
            </div>
            <div class="modal-footer">
                <button wire:click="sendRequestProduct({{$selected_id}})" type="button" class="btn btn-success">Soliciar</button>
            </div>
        </div>
    </div>
</div>
