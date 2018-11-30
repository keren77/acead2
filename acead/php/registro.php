<?php
    
    include 'conexion.php';
    
    $obj = new BaseDatos();
    $obj->Abrir_Conexion();
    $idUser = 0;
    $fechaVencimiento = '2019-01-01';
    
    $pnombre = isset($_POST['pnombre']) ? $_POST['pnombre'] : null;
    $snombre = isset($_POST['snombre']) ? $_POST['snombre'] : null;
    $papellido = isset($_POST['papellido']) ? $_POST['papellido'] : null;
    $sapellido = isset($_POST['sapellido']) ? $_POST['sapellido'] : null;
    $identidad = isset($_POST['nidentidad']) ? $_POST['nidentidad'] : null;
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $ntelefono = isset($_POST['ntelefono']) ? $_POST['ntelefono'] : null;
    $autocontrasena = isset($_POST['auto_contrasena']) ? $_POST['auto_contrasena'] : null;
    $autocontrasena2 = isset($_POST['auto_contrasena2']) ? $_POST['auto_contrasena2'] : null;
    $dircorreo = isset($_POST['dircorreo']) ? $_POST['dircorreo'] : null;
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
    
    $hoy = getdate();
    $fecha_actual = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
    
    if(isset($autocontrasena) && isset($autocontrasena2)){
        if($autocontrasena == $autocontrasena2){
            try{
                
                //verifica si no existe una cuenta con el correo que se intenta agregar
                $sqlCorreo = "SELECT COUNT(*) as cantidad FROM tbl_Usuarios WHERE CorreoElectronico = '".$dircorreo."';";
                $result = mysqli_query($obj->getCONEXION(), $sqlCorreo);
                $fila2 = mysqli_fetch_assoc($result);
                
                if($fila2['cantidad'] > 0){
                    header('Location: autoregistro.php?error=mail');
                }else{
                    $consPers = "INSERT INTO tbl_Personal(PrimerNombre, SegundoNombre, PrimerApellido, SegundoApellido, Telefono, Email, Cedula, CreadoPor, ModificadoPor, FechaCreacion, FechaModificacion, id_Departamentos, Id_EstadoCivil, Id_Genero) VALUES('".$pnombre."','".$snombre."','".$papellido."','".$sapellido."','".$ntelefono."','".$dircorreo."','".$identidad."','Autoregistro','AutoRegistro', '".$fecha_actual."','".$fecha_actual."',1,1,1);";
                    $resConsultaPers = mysqli_query($obj->getCONEXION(), $consPers);

                    $indice = "SELECT * FROM tbl_Personal ORDER BY Id_Empleado DESC LIMIT 1;";
                    $resIndice = mysqli_query($obj->getCONEXION(), $indice);

                    if(!$resIndice){
                        echo '<script>alert("NO HAY EMPLEADOS REGISTRADOS!!");</script>';
                    }else{
                        $fila1 = mysqli_fetch_array($resIndice); 
                        $idUser = $fila1[0];
                    }

                    if($hoy['mon'] == 2 && ($hoy['mday'] > 29)){if($hoy['mo'] >= 12){
                        $fechaVencimiento = ($hoy['year'] + 1)."-".$hoy['mo']."-".$hoy['mday'];
                    }}else{$fechaVencimiento = $hoy['year']."-".($hoy['mon'] + 1)."-".$hoy['mday'];}

                    $consUser = "INSERT INTO tbl_Usuarios(Usuario, Contrasena, FechaUltimaConex, PreguntasContestadas, FechaVencimiento, CorreoElectronico, Id_Estado, Id_Rol, Id_Empleado, FechaCreacion, FechaModificacion, CreadoPor) VALUES('".$username."','". password_hash($autocontrasena, PASSWORD_DEFAULT)."','".$fecha_actual."',0,'".$fechaVencimiento."','".$dircorreo."',1,4,".$idUser.",'".$fecha_actual."','".$fecha_actual."', 'Autoregistro');";
                    $resConsulUser = mysqli_query($obj->getCONEXION(), $consUser);
                    
                    /*$userIndex = 'SELECT * FROM tbl_Usuarios ORDER BY Id_usuario DESC LIMIT 1;';
                    $resUserIndex = mysqli_query($obj->getCONEXION(), $userIndex);
                    $fila3 = mysqli_fetch_array($resUserIndex);
                    $indiceUsuario = $fila3[0];
                    
                    $insDirect = "INSERT INTO tbl_Direcciones(Direcciones, Id_Alumno, Id_Empleado) VALUES('".$direccion."',".$indiceUsuario.",".$idUser.");";
                    */
                    //echo '<script>alert("¡USUARIO AGREGADO EXITOSAMENTE!");</script>'; 
                    header('Location: ../index.php?error=ok');
                }
                
                
            } catch (Exception $e){
                echo '<script>alert("ERROR: '.$e.'");</script> ';
            }
        }else{
            header('location: autoregistro.php?error=2');
        }
    }else{
        header('location: autoregistro.php?error=1');
    }
