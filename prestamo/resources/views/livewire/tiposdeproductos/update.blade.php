<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <br>
            <div class="container">
                <div class="alert colordark" role="alert">
                    <div class="row">
                        <div class="col-lg-9 col-md-6 col-sm-2">
                            <div class="usuario-white">
                                Actializar Categoria
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body">

                <div class="wrapper-agregarusuario">
                    <div class="form-container">
                        <div class="form-inner">
                            <form class="signup">
                            <input type="hidden" wire:model="selected_id">

                                <label>Ingresa los datos por favor.</label>
                                <div class="field">
                                    <label>Categoria <b class="rojo">*</b></label>
                                    <input wire:model="clasificacion" type="text" class="form-control" id="clasificacion" placeholder="Clasificacion">@error('clasificacion') <span class="error text-danger">{{ $message }}</span> @enderror

                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="cancelar" data-dismiss="modal">Cancelar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
