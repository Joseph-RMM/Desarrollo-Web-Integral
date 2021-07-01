<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            
            <div class="form-group">
                <label for="nombre"></label>
                <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="categoria"></label>
                <input wire:model="categoria" type="text" class="form-control" id="categoria" placeholder="categoria">@error('Descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="Descripcion"></label>
                <input wire:model="Descripcion" type="text" class="form-control" id="Descripcion" placeholder="Descripcion">@error('Descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="foto"></label>
                <input wire:model="foto" type="file" class="form-control" id="foto" placeholder="Foto">@error('foto') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="Estado_actual_del_producto"></label>
                <input wire:model="Estado_actual_del_producto" type="text" class="form-control" id="Estado_actual_del_producto" placeholder="Estado Actual Del Producto">@error('Estado_actual_del_producto') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_usuario"></label>
                <input wire:model="id_usuario" type="text" class="form-control" id="id_usuario" placeholder="Id Usuario">@error('id_usuario') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="id_tipo_producto"></label>
                <input wire:model="id_tipo_producto" type="text" class="form-control" id="id_tipo_producto" placeholder="Id tipo_producto">@error('id_tipo_producto') <span class="error text-danger">{{ $message }}</span> @enderror
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