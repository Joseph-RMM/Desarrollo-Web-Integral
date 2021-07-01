@extends('layouts.app')
@section('content')
<div class="container">
    <div class="alert colordark" role="alert">
        <div class="row">
            <div class="col-lg-9 col-md-6 col-sm-2">
                <div class="usuario-white">
                    Actializar usuario
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <center>

        <!--Formulario Registrar-->

        <div class="wrapper-agregarusuario">
            <div class="form-container">
                <div class="form-inner">
                    <form  class="signup">
                    <input type="hidden" wire:model="selected_id">

                        <label>Ingresa los datos por favor.</label>
                        <div class="field">
                            <label for="name">Nombre <b class="rojo">*</b></label>
                            <input wire:model="name" type="text"  id="name" placeholder="Name">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="field">
                            <label for="lastname">Apellido Materno <b class="rojo">*</b></label>
                            <input wire:model="lastname" type="text"  id="lastname" placeholder="Lastname">@error('lastname') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="field">
                            <label for="tel">Teléfono <b class="rojo">*</b></label>
                            <input wire:model="tel" type="text"  id="tel" placeholder="Tel">@error('tel') <span class="error text-danger">{{ $message }}</span> @enderror

                        </div>
                        <div class="field">
                            <label for="email">Correo electronico <b class="rojo">*</b></label>
                            <input wire:model="email" type="text"  id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        
                        <!--BOTONES DE ACEPTAR Y CANCELAR-->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="field">
                                    <button class="cancelar" type="button"> <a class="cancelar" href="{{ url('/users') }}">Cancelar</a></button>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="field">
                                    <button class="btn btn-primary" wire:click.prevent="update()" type="button">Aceptar</button>
                                </div>
                            </div>
                        </div>
                        <!--BOTONES DE ACEPTAR Y CANCELAR-->
                    </form>
                </div>
            </div>
        </div>
    </center>
</div>


@endsection