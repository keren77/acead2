<?php

    include 'conexion.php';
    include 'start_sess.php';
    
    $obj = new BaseDatos();
    $obj->Abrir_Conexion();
    
    $usuarioA = filter_input(INPUT_GET, 'user');
    $codigoA = filter_input(INPUT_GET, 'code');
    
    if(isset($usuarioA) && isset($codigoA)){
        try{
            $consulta = "SELECT * FROM tbl_Usuarios WHERE Usuario='".$usuarioA."' AND code='".$codigoA."'";
            $stmt = $obj->getCONEXION()->query($consulta);
            $numF = $stmt->num_rows;
            //echo '<script>alert("'.$usuarioA.' code='.$codigoA.'");</script>';
            /*if($numF > 0){
                $row = mysqli_fetch_array($stmt);
                $insnuevaPass = "UPDATE tbl_Usuarios SET Contrasena='". password_hash($codigoA, PASSWORD_DEFAULT)."' WHERE Usuario=".$usuarioA.";";
                $resInsNP = $obj->getCONEXION()->query($insnuevaPass);
                
            }*/
        } catch (Exception $e){
            
        }
    }
    
   ?>

<head>
    <meta charset="utf8">
    <title>Cambio de contraseña</title>
</head>

<?php
    include '../header.php';
?>

<body>
    <div class="row" style="margin-top: 50px;">
        <div class="col-lg-10" style="margin-right: auto; margin-left: auto;">
            <div class="card" id="aaa">
                <div class="card-header">
                    <strong>Recuperación de contraseña</strong>
                </div>
                
                <div class="card-body card-block">                    
                    <form action="proc_recuperacion.php" method="POST" name="frmRecuperar" id="frmREC">
                        <div class="form-group col-lg-12 form-inline">
                            Nueva contraseña para <?php echo ': ';?><strong>
                            <label name="lblUser"><?php echo $usuarioA;?></label>
                            </strong>
                        </div>
                        <div class="form-group col-lg-12 form-inline">
                            <input type="password" class="form-control col-lg-11" id="AutoPass1" maxlength="8" minlength="5" pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{5,8}$" title="La contraseña debe tener entre 5 y 8 caracteres, al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter especial." required="" name="contra1" placeholder="Contraseña" class="form-control pwd1">
                            <span class="input-group-btn">
                                
                            </span>
                        </div>
                        <div class="form-group col-lg-12 form-inline">
                            <input type="hidden" id="usr" name="usr" value=<?php echo '"'.$usuarioA.'"';?>>                       
                             
                        </div>
                        <div class="form-group col-lg-12 form-inline">
                            <input type="password" class="form-control col-lg-11" id="AutoPass2" maxlength="8" minlength="5" pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{5,8}$" title="La contraseña debe tener entre 5 y 8 caracteres, al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter especial." required="" name="contra2" placeholder="Confirma contraseña" class="form-control pwd1">
                            <span class="input-group-btn">
                                
                            </span>
                        </div>
                        
                        <div class="form-check" style="text-align: left; clear: both;">
                            <label>
                                <input type="checkbox" id="verpass" value="remember-me"> Ver Password
                            </label> 
                        </div>                        
                        
                        <div class="form-group col-lg-12 form-inline">                    
                            <div class="form-group col-lg-8 text-center" style="margin-left: auto; margin-right: auto; margin-top: 20px;">
                                <button id="autoregistro_boton" type="submit" class="btn btn-lg btn-info btn-block col-lg-4" name="botonRecupera" style="margin-left: auto; margin-right: auto;">
                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                    <span href="">Registrarse</span>
                                </button>
                            </div>
                        </div>
                        <div class="form-group col-lg-12 text-center">
                            <button type="reset" class="btn btn-link" style="margin-left: auto; margin-right: auto;">LIMPIAR</button>
                        </div>
                    </form>
                </div>
                
                <div class="card-footer text-center">
                    <?php
                        $msj = filter_input(INPUT_GET, 'error');
                        $valor = filter_input(INPUT_GET, 'valor');
                        
                        switch ($msj){
                            case '1':
                                echo '<br><div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"> Hubo un problema con las contraseñas!<button type="button" id="cierra" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
                                break;
                            case '2':
                                echo '<br><div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"> No se pudo actualizar la contraseña: '.$valor.'<button type="button" id="cierra" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
                                break;
                            case '3':
                                echo '<br><div class="sufee-alert alert with-close alert-success alert-dismissible fade show"> Contraseña actualizada exitosamente!<button type="button" id="cierra" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
                                break;
                            case '4':
                                echo '<br><div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"> Las contraseñas no coinciden!<button type="button" id="cierra" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
                                break;
                        }
                    ?>
                    
                    &copy; 2018 - 2019
                </div>
            </div>
        </div>        
        
    </div>
    
    <script src="../js/controlador.js"></script>
    <script src="../js/manager_index.js"></script>  
    <script>
        var $jq = jQuery.noConflict();
        
        $jq(document).ready(function(){
            $jq('#verpass').on('click', function(){
                if($jq('#verpass').is(':checked')){
                    $jq('#AutoPass1').attr('type', 'text');
                    $jq('#AutoPass2').attr('type', 'text');
                }else{
                    $jq('#AutoPass1').attr('type', 'password');
                    $jq('#AutoPass2').attr('type', 'password');
                }
            });
        });
        
    </script>
</body>
    
