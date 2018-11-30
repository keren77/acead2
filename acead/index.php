<?php ?>

<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/logo_mini.jpg">

        <title>Entrar</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>

    <body class="text-center">
        <div class="form-signin">
            <form action="php/validar.php" method="POST">
                <a href="index.php"><img class="mb-3" src="img/logo_inicio.jpg" style="width: 80px; height: 100px;"></a>
                <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesión</h1>
                <label class="sr-only">Código</label>
                <div class="form-group">
                    <input type="text" id="user" name="user" class="form-control" placeholder="USER" maxlength="10" minlength="5" style="text-transform: uppercase;" autocomplete="" required="">
                    <label for="unputPassword" class="sr-only">Password</label><br>
                    <input type="password" id="pass" name="pass" class="form-control" placeholder="PASSWORD" maxlength="20" minlength="8" value="" autocomplete="off" required="">
                </div>
                <div class="form-check" style="text-align: left;">
                    <label>
                        <input type="checkbox" id="verpass" value="remember-me"> Ver Password
                    </label> 
                </div>
                <div class="message" style="display: none;">
                    <label class="alert">AAAAAA</label>
                </div>
                <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block" id="btnEntrar" type="submit">ENTRAR</button>
                        <?php
                            $stat = 0;

                            //Recibe el parametro que indica el tipo de error o mensaje a mostrar
                            $msj = filter_input(INPUT_GET, 'error');
                            $valor = filter_input(INPUT_GET, 'valor');

                            //Se selecciona el caso recibido
                            switch ($msj) {
                                case 'oculto':
                                    echo '<br><div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"> Ya no puede intentarlo de nuevo, sobrepasó la cantidad de intentos disponibles (3)<button type="button" id="cierra" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
                                    break;
                                case '1':
                                    echo '<br><div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">   Datos incorrectos!!!<button id="cierra" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" id="cierre" name="cierra">×</span></button></div>';
                                    echo '<script>alert("EROR 1:'.$valor.'");</script>';                                    
                                    break;
                                case '2':
                                    echo '<br><div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"><span class="badge badge-pill badge-danger">ERROR: </span> Su usuario esta bloqueado o inactivo, favor comuniquese con el administrador.<button type="button" id="cierra" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" id="cierre">×</span></button></div>';
                                    break;
                                case '3':
                                    echo '<br><div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"> Contraseña incorrecta!!<button type="button" id="cierra" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
                                    echo '<script>alert("'.$valor.'");</script>';
                                    break;
                                case 'ok':
                                    echo '<br><div class="sufee-alert alert with-close alert-success alert-dismissible fade show"><span class="badge badge-pill badge-success">NOTICE: </span> ¡USUARIO AGREGADO EXITOSAMENTE!<button type="button" id="cierra" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" id="cierre">×</span></button></div>';
                                    break;
                            }
                            echo '<button class="btn btn-link" type="button"><a href="php/recupera.php">¿Olvidaste tu usuario y/o contraseña?</a></button>';
                            echo '<button class="btn btn-link" type="button"><a href="php/autoregistro.php">Registrate en el sistema</a></button>';
                            
                        ?>


                </div>
                <div class="card-footer">
                    &copy; 2018-2019
                </div>
            </form>
        </div>


        <script src="js/controlador.js"></script>
        <script src="js/manager_index.js"></script>
    </body>
</html>

