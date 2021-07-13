<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prueba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h4>crear products</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="Aqui va el store" method="post">
                    <div class="form-group">
                        <label for="Nombre">nombre</label>
                        <input type="text" class="form-group" name="Nombre" required minlength="4" >
                    </div>
                    <div class="form-group">
                        <label for="id_tiposdeproductos">id_tiposdeproductos</label>
                        <input type="text" class="form-group" name="id_tiposdeproductos" required  >
                    </div>
                    <div class="form-group">
                        <label for="Descripcion">Descripcion</label>
                        <input type="text" class="form-group" name="Descripcion" required minlength="20" >
                    </div>
                    <div class="form-group">
                        <label for="foto">foto</label>
                        <input type="file" class="form-group" name="foto" required >
                    </div>
                    <div class="form-group">
                        <label for="Estado_actual_del_producto">Estado_actual_del_productoto</label>
                        <input type="text" class="form-group" name="Estado_actual_del_producto" required >
                    </div>
                    <div class="form-group">
                        <label for="id_usuario">id_usuario</label>
                        <input type="text" class="form-group" name="id_usuario" required >
                    </div>

                </form>
            </div>


        </div>
    </div>
</body>
</html>