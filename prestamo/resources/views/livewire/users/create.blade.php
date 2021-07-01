@extends('layouts.app')
@section('content')
<div class="container">
    <div class="alert colordark" role="alert">
        <div class="row">
            <div class="col-lg-9 col-md-6 col-sm-2">
                <div class="usuario-white">
                    Agregar usuario
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
                    <form action="#" class="signup">
                        <label>Ingresa los datos por favor.</label>
                        <div class="field">
                            <label>Nombre <b class="rojo">*</b></label>
                            <input type="text" required>
                            <input class="rojo" type="hidden" name="nombre">
                        </div>
                        <div class="field">
                            <label>Apellido Paterno <b class="rojo">*</b></label>
                            <input type="text" required>
                            <input class="rojo" type="hidden" name="apellidop">
                        </div>
                        <div class="field">
                            <label>Apellido Materno <b class="rojo">*</b></label>
                            <input type="text" required>
                            <input class="rojo" type="hidden" name="apellidom">
                        </div>
                        <div class="field">
                            <label>Teléfono <b class="rojo">*</b></label>
                            <input type="text" required>
                            <input class="rojo" type="hidden" name="telefono">
                        </div>
                        <div class="field">
                            <label>Correo electronico <b class="rojo">*</b></label>
                            <input type="email" required>
                            <input class="rojo" type="hidden" name="correo">
                        </div>
                        <div class="field">
                            <label>Contraseña <b class="rojo">*</b></label>
                            <input type="password" required>
                            <input class="rojo" type="hidden" name="contraseña">
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
                                    <button class="btn btn-primary" type="submit">Agregar</button>
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