<div>
                    <input wire:model="foto" type="file" class="form-control" id="foto" placeholder="Foto" enctype="multipart/form-data">@error('foto') <span class="error text-danger">{{ $message }}</span> @enderror
      <br />    
      <br />   
                    <button wire:click="upload">upload</button>
</div>
