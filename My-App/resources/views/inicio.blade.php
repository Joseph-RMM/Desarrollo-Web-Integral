<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/estilo-login.css') }}" />
</head>
<body>
<!-- Navegación-->
<nav class="navbar navbar-expand-lg navbar-light bg">
    <a class="navbar-brand" href="#">Family Benefits</a>
    <!--IMPORTANTEEE!!!!!!
    Tengo problemas con el boton responsive, cuando esta en dispositivo movil la figura cubre 
    el boton causando que no se pueda cliquear, ando viendo que pepe
    -->
    <button class="navbar-toggler boton-pequeño" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Productos <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>

<!-- Figuras-->
<div class="Figuras2">

</div>
<div class="Figuras">

</div>



<br>
<!--Formulario-->
<div class="row">
    <div class="col-lg-1"></div>
    <!--FORMULARIO SIGN IN Y SIGN UP-->
    <div class="col-lg-4">
        <div class="wrapper">
            <div class="form-container">
                <div class="slide-controls">
                    <input type="radio" name="slide" id="login" checked>
                    <input type="radio" name="slide" id="signup">
                    <label for="login" class="slide login">Sign In</label>
                    <label for="signup" class="slide signup">Sign Up</label>
                    <div class="slider-tab"></div>
                </div>
                <div class="form-inner">
                    <form action="#" class="login">
                        <label>Ingresa tus datos para poder acceder.</label>
                        <div class="field">
                            <label>Correo <b class="rojo">*</b></label>
                            <input type="email" required>
                        </div>
                        <div class="field">
                            <label>Password <b class="rojo">*</b></label>
                            <input type="password" required>
                        </div>
                        <div class="field btn">
                            <div class="btn-layer"></div>
                            <input type="submit" value="Aceptar">
                        </div>
                    </form>
                    <form action="#" class="signup">
                        <label>Ingresa tus datos para poder crear una cuenta.</label>
                        <div class="row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="field">
                                    <label>Nombre <b class="rojo">*</b></label>
                                    <input type="text" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="field">
                                    <label>Apellido <b class="rojo">*</b></label>
                                    <input type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label>Teléfono <b class="rojo">*</b></label>
                            <input type="password" required>
                        </div>
                        <div class="field">
                            <label>Correo electronico <b class="rojo">*</b></label>
                            <input type="email" required>
                        </div>
                        <div class="field">
                            <label>Contraseña <b class="rojo">*</b></label>
                            <input type="password" required>
                        </div>
                        <div class="field btn">
                            <div class="btn-layer"></div>
                            <input type="submit" value="Aceptar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--FORMULARIO-->
    <div class="col-lg-1"></div>
</div>
<!--Formulario-->


<!--Pie de página-->
<footer class="footer">
    <p>Copyright &copy; Family Benefits.</p>
</footer>

<!--Pie de página-->


<script src="../js/estilo-login.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
</body>

</html>