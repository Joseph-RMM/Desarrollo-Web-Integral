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
        
        <h3>productos</h3>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('createp')}}" method="get">
                    
                    <div class="form-row">
                        <div class="col-auto my-11" >
                            <a href="{{route('createp')}}" class="btn btn-success">Crea Nuevo</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-12">
                <div class="table-response">
                    <div class="row">
                        @foreach($productos as $row)
                        <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
                            <div class="card cards" style="width: 18rem;">
                                <img class="card-img-top" src="{{ $row->foto }}">
                                <div class="card-body contenido">
                                    <h5 data-toggle="modal" data-target="#updateModal" wire:click="edit({{$row->id}})" class="card-title">{{ $row->nombre }}</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
    
</body>
</html>
@endsection