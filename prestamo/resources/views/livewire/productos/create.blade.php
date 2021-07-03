<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear un nuevo Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
        <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="nombre"></label>
                <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>


            <div class="form-group">
                <label for="Descripcion"></label>
                <input wire:model="Descripcion" type="text" class="form-control" id="Descripcion" placeholder="Descripcion">@error('Descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group" enctype="multipart/form-data">

                <label for="foto"></label>

                <input wire:model="foto" type="file" class="form-control" id="foto" placeholder="Sube aqui tu foto" accept='image/x-png,image/gif,image/jpg,image/jpeg' />@error('foto') <span class="error text-danger">{{ $message }}</span> @enderror



            </div>
            <div class="form-group">
                <label for="Estado_actual_del_producto"></label>

            <select wire:model="Estado_actual_del_producto" class='form-control'>
                <option value="D">Estado del producto</option>
                    <option value="P">Prestado</option>
                    <option value="D">Disponible</option>
            </select>
            </div>
            <div class="form-group">
                <label for="id_usuario"></label>
                <select  wire:model="id_usuario" class='form-control'>
                <option value="">usuario</option>
                    @foreach($users as $users)
                    <option value="{{auth()->user()->id}}">{{auth()->user()->id}} </option>
                    @endforeach
                </select>



            </div>

            <div class="form-group">
                <label for="id_tipo_producto"></label>
                <select wire:model='id_tiposdeproductos' class='form-control'>
                    <option value="">Clasificacion de producto</option>
                    @foreach($tiposdeproductos as $tiposdeproductos)
                    <option value="{{$tiposdeproductos->id}}">{{$tiposdeproductos->clasificacion}} </option>
                    @endforeach
            </select>
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
