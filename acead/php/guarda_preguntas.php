<?php

    include 'conexion.php';
    include 'start_sess.php';
    
    $obj = new BaseDatos();
    $obj->abrir_conexion();
    
    $idPregunta = isset($_POST['opPreguntas']) ? $_POST['opPreguntas'] : null;
    $respuesta = isset($_POST['respuestax']) ? $_POST['respuestax'] : null;
    
    $hoy = getdate();
    $fechaActual = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
    
    try{
        if($idPregunta == 0){
            header('Location: ../preguntas.php?msj=3');
        }else{
            $insertaResp = "INSERT INTO tbl_Preguntasusuario(Respuesta, Id_usuario, Id_pregunta, FechaCreacion, FechaModificacion, CreadoPor, ModificadoPor) VALUES('".$respuesta."',".$_SESSION['id'].",".$idPregunta.",'".$fechaActual."','".$fechaActual."','Autoregistro','Autoregistro');";
            $resultado = $obj->getCONEXION()->query($insertaResp);
            
            $actualizaEstado = "UPDATE tbl_Usuarios SET Id_Estado = 3 WHERE Id_usuario = ".$_SESSION['id'].";";
            $resultado2 = $obj->getCONEXION()->query($actualizaEstado);

            header('Location: ../preguntas.php?msj=1');
        }
        
    } catch (Exception $e){
        header('Location: ../preguntas.php?msj=2');
    }
    

