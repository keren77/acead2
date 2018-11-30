<?php
include 'php/conexion.php';
include 'php/start_sess.php';

/* session_start(); 
  if(!(isset($_SESSION['id']))) {
  header("Location: index.php");
  }
  if(($_SESSION['estado'] !=1)){
  header("Location: home.php");
  }
 */

$preguntas = 1;
$obj = new BaseDatos();
$obj->Abrir_Conexion();

$consulta = "SELECT valor FROM TBL_Parametros WHERE Parametro='ADMIN_PREGUNTAS'";
$stmt = $obj->getCONEXION()->query($consulta);
if ($row = mysqli_fetch_array($stmt)) {
    $preguntas = $row['valor'];
}


$consulta2 = "SELECT Id_Pregunta,Pregunta FROM TBL_Preguntas LIMIT " . $preguntas;
$stmt1 = $obj->getCONEXION()->query($consulta2);
$con = array();
$n = 0;
while ($row = $stmt1->fetch_row()) {
    $con[$n]['id'] = $row[0];
    $con[$n]['pregunta'] = $row[1];
    $n++;
}

$stmt->close();
$stmt1->close();
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/logo_mini.jpg">

        <title>Preguntas de seguridad</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>

    <body>
        <div class="col-lg-8" style="margin-left: auto; margin-right: auto;">
            <div class="card">
                <div class="card-header">
                    <div class="input-group-addon text-center">
                        <i class="fa fa-question-circle"></i>
                        <strong>Preguntas de seguridad</strong>
                    </div>
                </div>
                <div class="card-body card-block">
                    <form id="frmPreguntas" action="php/guarda_preguntas.php" method="POST" >
                        <div class="form-group">
                            <select name="opPreguntas" id="selectPreg" class="form-control">
                                <option value="0" disabled="" selected="">Selecciona un pregunta...</option>
                                <?php
                                    $sqlPreguntas = 'SELECT P.Id_Pregunta, P.Pregunta FROM tbl_Preguntas P WHERE P.Id_Pregunta NOT IN(SELECT Id_pregunta FROM tbl_Preguntasusuario WHERE Id_usuario = '.$_SESSION['id'].');';
                                    $sentencia = mysqli_query($obj->getCONEXION(), $sqlPreguntas);

                                    while ($fila = mysqli_fetch_array($sentencia)){
                                        echo '<option value="'.$fila['Id_Pregunta'].'">'.$fila['Pregunta'].'</option>';
                                    }
                                ?>
                            </select><br>
                            <input type="text" name="respuestax" class="form-control" placeholder="Redacta tu respuesta" required="">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-lg btn-info btn-block" type="submit" style="margin-left: auto; margin-right: auto; width: 30%;">
                                <i class="fa fa-check-circle fa-lg"></i>
                                <span>Guardar respuesta</span>
                            </button>                            
                        </div>
                    </form>
                    <a class="btn btn-link btn-sm btn-block" style="margin-left: auto; margin-right: auto; width: 30%;" href="home.php">
                        <i class="fa fa-link"></i>
                        AVANZAR
                    </a>
                    
                </div>
                <?php
                    $msj = filter_input(INPUT_GET, 'msj');
                    
                    switch ($msj){
                        case '1':
                            echo '<br><div class="sufee-alert alert with-close alert-success alert-dismissible fade show"> ¡Respuesta agregada exitosamente!<button type="button" id="cierra" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
                            break;
                        case '2':
                            echo '<br><div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"> ¡Hubo un problema al agregar la respuesta!<button type="button" id="cierra" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
                            break;
                        case '3':
                            echo '<br><div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"> ¡Debes seleccionar una pregunta o Presiona Avanzar!<button type="button" id="cierra" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
                            break;
                    }
                ?>
            </div>
        </div>
        <script src="js/controlador.js"></script>
        <script src="js/manager_index.js"></script>
    </body>
</html>
