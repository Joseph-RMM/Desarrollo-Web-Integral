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
        <h3>Cosas raras de productos</h3>
        <div class="row">
            <div class="col-xl-12">
                <form action="" method="get">
                    <div class="form-row">
                        <div class="col-auto my-11" >
                            <a href="Aqui va la direccion" class="btn btn-success">Crea Nuevo</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-12">
                <div class="table-response">
                    <table class="table-striped">
                        <thead>
								<th>Nombre</th>
								<th>Categoria</th>
								<th>Descripcion</th>
								<th>Foto</th>
                                <th>Foto2</th>
                                <th>Foto3</th>
								<th>Estado Actual Del Producto</th>
								<th>Id Usuario</th>
								<td>ACTIONS</td>
                        </thead>
                        <tbody>
                        @foreach($productos as $producto)
							<tr>
								 
								<td>{{ $producto->nombre }}</td>
								<td>{{ $producto->id_tiposdeproductos }}</td>
								<td>{{ $producto->Descripcion }}</td>
								<td>{{ $producto->foto }}</td>
                                <td>{{ $producto->foto2 }}</td>
                                <td>{{ $producto->foto3 }}</td>
								<td>{{ $producto->Estado_actual_del_producto }}</td>
								<td>{{ $producto->id_usuario }}</td>
								<td >Editar-
                                    Eliminar
								</td>
                            </tr>
						@endforeach   
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    
</body>
</html>