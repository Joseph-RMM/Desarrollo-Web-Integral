<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Productossolicitado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="id_tiposdeproductos"></label>
                <input wire:model="id_tiposdeproductos" type="text" class="form-control" id="id_tiposdeproductos" placeholder="Id Tiposdeproductos">@error('id_tiposdeproductos') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="fecha_entrega"></label>
                <input wire:model="fecha_entrega" type="text" class="form-control" id="fecha_entrega" placeholder="Fecha Entrega">@error('fecha_entrega') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="fecha_devolucion"></label>
                <input wire:model="fecha_devolucion" type="text" class="form-control" id="fecha_devolucion" placeholder="Fecha Devolucion">@error('fecha_devolucion') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_solicitud"></label>
                <input wire:model="id_solicitud" type="text" class="form-control" id="id_solicitud" placeholder="Id Solicitud">@error('id_solicitud') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
       </div>
    </div>
</div>