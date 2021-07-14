<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<body>
    <div class="container">
        <h4>nuevo producto</h4>
        <div class="row">
            <div >
                <form action="AQUI VA LA RUTA DE STORE" method="get">
                <label>Crear un nuevo Producto</label>
                                <div class="form-group">
                                    <label>Nombre <b class="rojo">*</b></label>
                                    <input for="nombre" type="text" id="nombre" placeholder="nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label>Descripcion <b class="rojo">*</b></label>
                                    <input for="Descripcion" type="text" id="Descripcion" placeholder="Descripcion">@error('Descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="fieform-groupld">
                                    <label>Añadir tres imagenes <b class="rojo">*</b></label>
                                    <br>
                                    <input for="foto" type="file"  id="foto" placeholder="Sube aqui tu foto" multiple accept='image/x-png,image/gif,image/jpg,image/jpeg' />@error('foto') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label>Estado actual del producto <b class="rojo">*</b></label>
                                    <br>
                                    <select for="Estado_actual_del_producto">
                                        <option value="D">Estado del producto</option>
                                        <option value="P">Prestado</option>
                                        <option value="D">Disponible</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Id tipo producto <b class="rojo">*</b></label>
                                    <br>
                                    <select for='id_tiposdeproductos' >
                                        <option value="1">Clasificacion de producto</option>
                                    </select>
                                </div>
                                <div class="modal-footer">

                                    <input type="submit" class="btn-primary" value="guardar">
                                    <input type="submit" class="btn-primary" value="cancelar">
                                   

                                </div>
                </form>
            </div>
        </div>
    </div>
</body>

--------------------------------------------------------------------------

