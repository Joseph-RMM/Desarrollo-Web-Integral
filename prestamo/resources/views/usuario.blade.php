@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')

<br><br>
<div class="container">
    <div class="alert colordark" role="alert">
        <div class="row">
            <div class="col-lg-9 col-md-6 col-sm-2">
                <div class="usuario-white">
                    <b>Usuarios</b>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido Materno</th>
                    <th scope="col">Apellido Paterno</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Alison</td>
                    <td>Herrera</td>
                    <td>Ortiz</td>
                    <td>21324354656</td>
                    <td>holag@gmail.com</td>
                    <td>
                        <a href="#"><button type="submit" class="button-rojo button5" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-trash-alt"></i></button></a>
                    </td>
                </tr>
                <tr>
                    <td>Montse</td>
                    <td>Tlachi</td>
                    <td>Anzures</td>
                    <td>5657687879</td>
                    <td>holag@gmail.com</td>
                    <td>
                        <a href="#"><button type="submit" class="button-rojo button5" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-trash-alt"></i></button></a>
                    </td>
                </tr>
                <tr>
                    <td>Concepcion</td>
                    <td>Flores</td>
                    <td>Miranda</td>
                    <td>455602495</td>
                    <td>ho6ag@gmail.com</td>
                    <td>
                        <a href="#"><button type="submit" class="button-rojo button5" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-trash-alt"></i></button></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">¿Eliminar Usuario?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Al eliminar al usuario él ya no podrá tener acceso al sistema.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection