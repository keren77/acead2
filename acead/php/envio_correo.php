<?php

    include 'conexion.php';
    include 'start_sess.php';
    include '../PHPMailer/PHPMailerAutoload.php';
    include 'generapass.php';
    
    $obj = new BaseDatos();
    $obj->Abrir_Conexion();
    
    $generador = new GenerarPass();
    $codigoGenerado = $generador->NuevaPass(8);
    
    $usuarioX = isset($_POST['mailsend']) ? $_POST['mailsend'] : null;
    
    if(!isset($_POST['mailsend'])){
        header('Location: recupera.php?msj=1');
    }
    
    try{
        $cons3 = "SELECT * FROM tbl_Usuarios WHERE Usuario='".$usuarioX."';";
        $res3 = $obj->getCONEXION()->query($cons3);
        $numrows = $res3->num_rows;
        
        if($numrows > 0){
            $insCode = "INSERT INTO tbl_Usuarios(code) VALUES('".$codigoGenerado."') WHERE Usuario='".$usuarioX."';";
            $resInsrt = $obj->getCONEXION()->query($insCode);
        }
    } catch (Exception $e){
        header('Location: recupera.php?msj=1');
    }
    
    try{
        $sql = "SELECT code, CorreoElectronico FROM tbl_Usuarios WHERE Usuario = '".$usuarioX."';";
        $resql = $obj->getCONEXION()->query($sql);
        
        if($row = mysqli_fetch_array($resql)){
            $cod = $row['code'];
            $mail = $row['CorreoElectronico'];
            
            //Codigo para el envío del correo electrónico
            $dir_correo = $mail;
            $emailSubject = "Recuperación de contraseña";
            $emailBody = "<strong>Hola ".$usuarioX.":</str7ong><br>Su link de recuperación de contraseña es el siguiente: <br>"
                    . "<a href='http://localhost/acead/php/nuevacontra.php?user='".$usuarioX."&code=".$cod.">Clicka aquí para ir sitio...</a>";
            
            $mail_ppal = new PHPMailer();
            $mail_ppal->isSMTP();
            $mail_ppal->SMTPDebug = 0;
            $mail_ppal->Debugoutput = 'html';
            $mail_ppal->Host = 'smtp.gmail.com';
            $mail_ppal->Port = 587;
            $mail_ppal->SMTPSecure = 'tls';
            $mail_ppal->SMTPAuth = true;
            $mail_ppal->Username = 'academiacead@gmail.com';
            $mail_ppal->Password = 'academiacead2018';
            $mail_ppal->setFrom('academiacead@gmail.com', 'Academia CEAD');            
            $mail_ppal->addAddress($dir_correo, $usuarioX);            
            $mail_ppal->Subject = $emailSubject;            
            $mail_ppal->msgHTML($emailBody);

            if(!$mail_ppal->send()){
                header('Location: recupera.php?msj=2&err='.$mail_ppal->ErrorInfo);
            }else{
                header('Location: recupera.php?msj=3');
            }
        }else{
            header('Location: recupera.php?msj=1');
        }
    } catch (Exception $e){
        header('Location: recupera.php?msj=2&err='.$e->getMessage());
    }

