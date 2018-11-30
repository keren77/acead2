<?php

    include 'conexion.php';
    include 'start_sess.php';
    
    $obj = new BaseDatos();
    $obj->Abrir_Conexion();
    
    $contra1 = isset($_POST['contra1']) ? $_POST['contra1'] : null;
    $contra2 = isset($_POST['contra2']) ? $_POST['contra2'] : null;
    $userF = isset($_POST['usr']) ? $_POST['usr'] : null;
    $userR = isset($_POST['lblUser']) ? $_POST['lblUser'] : null;
    
    if($contra1 !== null && $contra2 !== null){
        try{
            if($contra1 == $contra2){
                //$cons = "UPDATE tbl_Usuarios SET Contrasena='".password_hash($contra1, PASSWORD_DEFAULT)."' WHERE Usuario = '".$userR."';";
                $newPass = password_hash($contra1, PASSWORD_DEFAULT);
                $cons = "UPDATE tbl_Usuarios SET Contrasena = '".$newPass."' WHERE Usuario = '".$userF."';";
                $res = $obj->getCONEXION()->query($cons);
                
                if($res){
                    //echo '<script>alert("'.$userF.'");</script>';
                    $obj->inserta_bitacora('Reponiendo password', 'Se ha cambiado el password del usuario a peticion', $_SESSION['id'], 6);
                    header('Location: ../index.php?error=4');
                }else{
                    header('Location: nuevacontra.php?error=1');
                }
            }else{
                header('Location: nuevacontra.php?error=4');
            }
        } catch (Exception $e){
            header('Location: nuevacontra.php?error=2&valor='.$e);
        }
    }else{
        header('Location: nuevacontra.php?error=1&valor=Contraseñas no coiciden o tienen problemas!');
    }
