<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Solicitude</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="Mensaje"></label>
                <input wire:model="Mensaje" type="text" class="form-control" id="Mensaje" placeholder="Mensaje">@error('Mensaje') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="status"></label>
                <select wire:model="status" class='form-control'>
                <option value="P">Estado del producto</option>
                    <option value="P">Pendiente</option>
                    <option value="A">Aceptar</option>
            </select>
            </div>
            <div class="form-group">
                <label for="id_usuario"></label>
                <input wire:model="id_usuario" type="text" class="form-control" id="id_usuario" placeholder="Id Usuario">@error('id_usuario') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_usuariosolicitante"></label>
                <select wire:model="id_usuariosolicitante" class='form-control'>
                    <option value="">Usuarios que puede que conoscas</option>
                     @foreach($users as $users)
                    <option value="{{$users->id}}">{{$users->name}} {{$users->lastname}}</option>
                    @endforeach
                </select>
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