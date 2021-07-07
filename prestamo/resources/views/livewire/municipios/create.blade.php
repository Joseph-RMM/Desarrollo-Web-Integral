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
                                    Agregar un Municipio
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
                                    <label> Nombre de Municipio <b class="rojo">*</b></label>
                                    <input wire:model="name" type="text"  id="name" placeholder="Name">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
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

                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Agregar</button>

            </div>
        </div>
    </div>
</div>