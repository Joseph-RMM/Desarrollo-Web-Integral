<!-- Modal -->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <div class="alert colordark" role="alert">
                        <div class="row">
                            <div class="col-lg-9 col-md-6 col-sm-2">
                                <div class="usuario-white">
                                    Crear un nuevo Producto
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrapper-agregarusuario">
                    <div class="form-container">
                        <div class="form-inner">
                            <form class="signup">
                                <label>Ingresa los datos por favor.</label>
                                <div class="field">
                                    <label>Nombre <b class="rojo">*</b></label>
                                    <input wire:model="nombre" type="text"  id="nombre" placeholder="nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="field">
                                    <label>Descripcion <b class="rojo">*</b></label>
                                    <input wire:model="Descripcion" type="text"  id="Descripcion" placeholder="Descripcion">@error('Descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="field">
                                    <label>Foto <b class="rojo">*</b></label>
                                    <input wire:model="foto" type="file"  id="foto" placeholder="Sube aqui tu foto" accept='image/x-png,image/gif,image/jpg,image/jpeg' />@error('foto') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="field">
                                    <label>Estado_actual_del_producto <b class="rojo">*</b></label>
                                    <br>
                                    <select wire:model="Estado_actual_del_producto" >
                                        <option value="D">Estado del producto</option>
                                        <option value="P">Prestado</option>
                                        <option value="D">Disponible</option>
                                    </select>
                                </div>

                                <div class="field">
                                    <label for="id_usuario"> Id usuario<b class="rojo">*</b></label>
                                    <br>
                                    <select wire:model="id_usuario">
                                        <option value="">usuario</option>
                                        @foreach($users as $users)
                                        <option value="{{auth()->user()->id}}">{{auth()->user()->id}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="field">
                                    <label for="id_tipo_producto"> Id tipo de productos <b class="rojo">*</b></label>
                                    <br>
                                    <select wire:model='id_tiposdeproductos' >
                                        <option value="">Clasificacion de producto</option>
                                        @foreach($tiposdeproductos as $tiposdeproductos)
                                        <option value="{{$tiposdeproductos->id}}">{{$tiposdeproductos->clasificacion}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div> <!-- modal-body -->
            <div class="modal-footer">

                <button type="button" class="cancelar" data-dismiss="modal">
                    Cancelar
                </button>

                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Agregar Productos</button>

            </div>
        </div>
    </div>
</div>