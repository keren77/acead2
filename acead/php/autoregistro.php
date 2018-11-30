<?php
    include '../header.php';
    
    $hoy = getdate();
    $fechaActual = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
?>
<head><title>Registro de usuario</title></head>
<div class="row" style="margin-top: 50px; padding: 0px;">
    <div class="card" style="width: 90%; margin-left: auto; margin-right: auto;">
        <div class="card-header">
            <strong>Formulario de registro</strong>
        </div>
        <div class="card-body card-block col-md-12">
            <form action="registro.php" method="POST" name="frmRegistroU">
                <div class="form-group col-lg-6">
                    <input type="text" class="form-control col-lg-12" name="pnombre" placeholder="Primer nombre" required="" style="text-transform: uppercase;">
                </div>
                <div class="form-group col-lg-6">
                    <input type="text" class="form-control col-lg-12" name="snombre" placeholder="Segundo nombre"  required="" style="text-transform: uppercase;">
                </div>
                <div class="form-group col-lg-6">
                    <input type="text" class="form-control col-lg-12" name="papellido" placeholder="Primer apellido"  required="" style="text-transform: uppercase;">
                </div>
                <div class="form-group col-lg-6">
                    <input type="text" class="form-control col-lg-12" name="sapellido" placeholder="Segundo apellido"  required="" style="text-transform: uppercase;">
                </div>
                <div class="form-group col-lg-6">
                    <input type="text" class="form-control col-lg-12" name="nidentidad" placeholder="Número de identidad"  required="" pattern="[0-9]{13}">
                </div>
                <div class="form-group col-lg-6">
                    <input type="text" class="form-control col-lg-12" name="ntelefono" placeholder="Número de telefono"   pattern="[0-9]{8}" maxlength="8" minlength="8">
                </div>
                <div class="form-group col-lg-6">
                    <input type="email" class="form-control col-lg-12" name="dircorreo" placeholder="Correo electrónico" required="">
                </div>
                <div class="form-group col-lg-6">
                    <input type="text" class="form-control col-lg-12" name="username" placeholder="Nombre de usuario" required="">
                </div>
                <div class="form-group col-lg-12 form-inline">
                    <input type="password" class="form-control col-lg-11" id="AutoPass" maxlength="30" minlength="5" pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{5,8}$" title="La contraseña debe tener entre 5 y 8 caracteres, al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter especial." required="" name="auto_contrasena" placeholder="Contraseña" class="form-control pwd1">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" id="btnPass"><i class="fa fa-eye"></i></button>
                    </span>
                </div>
                <div class="form-group col-lg-12 form-inline">
                    <input type="password" class="form-control col-lg-11" id="AutoPass" maxlength="30" minlength="5" pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{5,8}$" title="La contraseña debe tener entre 5 y 8 caracteres, al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter especial." required="" name="auto_contrasena2" placeholder="Confirma contraseña" class="form-control pwd1">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" id="btnPass"><i class="fa fa-eye"></i></button>
                    </span>
                </div>
                <div class="form-group col-lg-12 form-inline">
                    <textarea name="direccion" id="textarea-input" rows="9" placeholder="DIrección actual" class="form-control col-lg-11"></textarea>
                </div>
                <div class="form-group col-lg-6 form-inline">
                    <label class="font-weight-bold">Fecha de vencimiento: </label>
                    <label class="font-weight-bold col-lg-4" style="color: #880000;"><?php if($hoy['mon'] == 2 && ($hoy['mday'] > 29)){}else{$fechaFutura = $hoy['year']."-".($hoy['mon'] + 1)."-".$hoy['mday']; echo $fechaFutura;}?></label>
                </div>
                <div class="form-group col-lg-6 form-inline">
                    <label class="font-weight-bold">Fecha de edición: </label>
                    <label class="font-weight-bold col-lg-4" style="color: #699f00;"><?php echo " ".$fechaActual;?></label>
                    
                </div>
                <div class="form-group col-lg-12 form-inline">                    
                    <div class="form-group col-lg-8 text-center" style="margin-left: auto; margin-right: auto; margin-top: 20px;">
                        <button id="autoregistro_boton" type="submit" class="btn btn-lg btn-info btn-block col-lg-4" name="botonautoregistro" style="margin-left: auto; margin-right: auto;">
                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                            <span href="">Registrarse</span>
                        </button>
                    </div>
                    <div class="form-group col-lg-12 text-center">
                        <button type="button" class="btn btn-link" style="margin-left: auto; margin-right: auto;"><a href="../index.php">SALIR</a></button>
                    </div>
                </div>
            </form>
        </div>        
        <div class="card-footer">
            <?php
                $op_error = filter_input(INPUT_GET, 'error');
                
                switch ($op_error){
                    case '1':
                        echo '<br><div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"> ¡Debe llenar los campos de las contraseñas!<button type="button" id="cierra" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
                        break;
                    case '2':
                        echo '<br><div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"> ¡Las contraseñas no coinciden! <button type="button" id="cierra" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
                        break;
                    case 'mail':
                        echo '<br><div class="sufee-alert alert with-close alert-danger alert-dismissible fade show"> ¡La dirección de correo que intenta agregar ya está en uso en el sistema!<button type="button" id="cierra" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>';
                        break;
                }
            ?>
        </div>
    </div>
</div>