<?php
include '../header.php';
include 'start_sess.php';

include 'conexion.php';

$funcion = filter_input(INPUT_GET, 'modo');
$err = filter_input(INPUT_GET, 'error');

$obj = new BaseDatos();
$obj->Abrir_Conexion();

switch ($err) {
    case 'correo_no_existe':
        fcn_correoNoExiste();
        break;
}


/* $objCon = new basedatos();

  if (isset($_SESSION["user_name"])) {
  header("Location: ../home.php");
  }

  $errors = array();

  if (!empty($_POST)) {
  $ee = isset($_POST['email']) ? $_POST['email'] : '';
  $email = $mysqli->real_escape_string($ee);

  /*if (!isEmail($email)) {
  $errors[] = "Debe ingresar un correo electronico valido";
  } */

/* if ($objCon->emailExiste($email)) {
  $user_id = getValor('id', 'correo', $email);
  $nombre = getValor('nombre', 'correo', $email);

  $token = generaTokenPass($user_id);

  //$url = 'http://' . $_SERVER["SERVER_NAME"] . '/login/cambia_pass.php?user_id=' . $user_id . '&token=' . $token;
  $url = 'http://' . $_SERVER["SERVER_NAME"] . '/login/cambia_pass.php?user_id=' . $user_id . '&token=' . $token;

  $asunto = 'Recuperar Password - Sistema de Usuarios';
  $cuerpo = "Hola $nombre: <br /><br />Se ha solicitado un reinicio de contrase&ntilde;a. <br/><br/>Para restaurar la contrase&ntilde;a, visita la siguiente direcci&oacute;n: <a href='$url'>$url</a>";

  if (enviarEmail($email, $nombre, $asunto, $cuerpo)) {
  echo "Hemos enviado un correo electronico a las direcion $email para restablecer tu password.<br />";
  echo "<a href='../index.php' >Iniciar Sesion</a>";
  exit;
  }
  } else {
  $errors[] = "La direccion de correo electronico no existe";
  }
  } */
?>
<head><title>Recuperación de contraseña</title></head>
<div class="container">
    <div id="login-box" style="margin-top: 50px;">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Recuperación de contraseña
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="../index.php">Iniciar Sesión</a></div>
                    </div>

                    <div class="card-body card-block">
                        <?php

                        function fcn_correoNoExiste() {
                            echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                            <span class="badge badge-pill badge-danger">Error:</span>
                                                Este correo electrónico no esta registrado en el sistema!
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>';
                        }
                        ?>
                        <div style="display:none;" id="login-alert" class="alert alert-danger col-sm-12"></div>
                        <form id="frmrecupera" method="POST" action="envio_correo.php" autocomplete="off">
                            <div class="form-group">
                                <label class="form-control-label">Usuario registrado:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-mail-forward"></i>
                                    </div>
                                    <input name="mailsend" class="form-control" type="text" placeholder="Nombre de usuario">                                    
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Enviar correo</button>
                                    <button type="reset" class="btn btn-success">Limpiar</button>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            No tiene una cuenta! <a href="registro.php">Registrate aquí</a>
                                        </div>
                                    </div>
                                </div>   
                            </div>
                        </form>
                        <?php 
                            $msj = filter_input(INPUT_GET, 'msj');
                            $err = filter_input(INPUT_GET, 'err');
                            
                            switch ($msj){
                                case '1':
                                    echo '<br><div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"> ¡Este usuario no se ha encontrado!<button type="button" id="cierra" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
                                    break;
                                case '2':
                                    echo '<br><div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"> ERROR: '.$err.'<button type="button" id="cierra" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
                                    break;
                                case '3':
                                    echo '<br><div class="sufee-alert alert with-close alert-success alert-dismissible fade show"> ¡Se ha enviado un mensaje a tu cuenta de correo!<button type="button" id="cierra" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
                                    break;
                            }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>