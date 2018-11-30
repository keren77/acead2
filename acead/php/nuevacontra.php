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
            
            if($numF > 0){
                $row = mysqli_fetch_array($stmt);
                $insnuevaPass = "UPDATE tbl_Usuarios SET Contrasena='". password_hash($codigoGenerado, PASSWORD_DEFAULT)."' WHERE Id_Usuario=".$row['Id_Usuario'].";";
                $resInsNP = $obj->getCONEXION()->query($insnuevaPass);
                
            }
        } catch (Exception $e){
            
        }
    }
    
    function accesa_usuario($u, $p){
        if ((isset($u))&&(isset($p))) {
            
            $obj2 = new BaseDatos();
            $obj2->Abrir_Conexion();
            
            $consulta = "SELECT * FROM TBL_Usuarios WHERE Usuario='".$u."'";           
            $stmtB = $obj->getCONEXION()->query($consulta);
            
            if(($row=mysqli_fetch_array($stmtB))&&(password_verify($p,$row['Contrasena']))){
                
                $_SESSION['id']=$row['Id_usuario'];
                $_SESSION['nombre']=$row['Usuario'];
                $_SESSION['correo']=$row['CorreoElectronico'];
                $_SESSION['estado']=$row['Id_Estado'];
                $_SESSION['rol']=$_row['Id_Rold'];
                if($_SESSION['estado']==1){
                        header("Location: ../preguntas.php");
                }elseif($_SESSION['estado']==2){
                        header("Location: ../index.php?error=2");
                }elseif($_SESSION['estado']==3){
                        header("Location: ../home.php");
                }elseif($_SESSION['estado']==4){
                        header("Location: ../index.php?error=2");
                }
            }
            else{
                //$_SESSION['intentos']+=1;                    
                header("Location: ../index.php?error=1");
            }
            //session_start();
            
            $mysqli->close();

        }else{
                header("Location: ../index.php");
        }
    }
    
    
