@extends('layouts.app')

<div class="container">
    <div class="alert colordark" role="alert">
        <div class="row">
            <div class="col-lg-9 col-md-6 col-sm-2">
                <div class="usuario-white">
                    Actualizar usuario
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <form class="signup">
        <label>Ingresa los datos por favor.</label>
        <div class="field">
            <label>Nombre <b class="rojo">*</b></label>
            <input value="{{$name}}" type="text" id="name" placeholder="Name">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror

        </div>
        <div class="field">
            <label>Apellido Paterno <b class="rojo">*</b></label>
            <input wire:model="lastname" type="text" id="lastname" placeholder="Lastname">@error('lastname') <span class="error text-danger">{{ $message }}</span> @enderror

        </div>

        <div class="field">
            <label>Teléfono <b class="rojo">*</b></label>
            <input wire:model="tel" type="text" id="tel" placeholder="Tel">@error('tel') <span class="error text-danger">{{ $message }}</span> @enderror

        </div>
        <div class="field">
            <label>Correo electronico <b class="rojo">*</b></label>
            <input wire:model="email" type="email" id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror

        </div>
    </form>

    <button type="button" wire:click.prevent="cancel()" class="cancelar" data-dismiss="modal">Cancelar</button>
    //<button type="button" wire:click.prevent="updates()" class="btn btn-primary" data-dismiss="modal">Guardar</button>
</div>
