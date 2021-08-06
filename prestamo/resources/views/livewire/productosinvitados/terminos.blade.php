@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="es">
    
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos disponibles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <div class="alert colordark" role="alert">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-1">
                    <div class="usuario-white">
                        <b>Terminos y condiciones</b>
                    </div>
    
                </div>
                <div class="col-lg-5 col-md-5 col-sm-1">
                    @if (session()->has('message'))
                    <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
                    @endif
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2">
                    <div class="usuario-white">
                       
                    </div>
                </div>
            </div>
        </div>
    
    

    
    </div>
    
</body>
<button>
   
<a href="{{url('productosinvitado')}}" class="btn btn-success">Aceptar</a>

</html>
@endsection