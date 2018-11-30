<?php

    include 'conexion.php';
    include 'start_sess.php';
    include '../PHPMailer/PHPMailerAutoload.php';
    include '../PHPMailer/class.phpmailer.php';
    include '../PHPMailer/class.smtp.php';
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
            $insCode = "UPDATE tbl_Usuarios SET code='".$codigoGenerado."' WHERE Usuario='".$usuarioX."';";
            $resInsrt = $obj->getCONEXION()->query($insCode);
            $obj->inserta_bitacora('Solicitud password', 'Solicitando el cambio de password por correo', $_SESSION['id'], 3);
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
            $emailSubject = "Recuperacion de password";
            $emailBody = "<head><meta charset='utf-8'></head><strong>Hola ".$usuarioX.":</strong><br>Su link de recuperacion de contrasena es el siguiente: <br>"
                    . "<a href='http://localhost/acead/php/nuevacontra.php?user=".$usuarioX."&code=".$cod."'".">Clicka aqui para ir al sitio...</a>";
            
            /* $mail_ppal = new PHPMailer();
            $mail_ppal->isSMTP();
            $mail_ppal->SMTPDebug = 0;
            $mail_ppal->Debugoutput = 'html';
            $mail_ppal->Host = 'smtp.gmail.com';
            //$mail_ppal->Host = 'smtp-pulse.com';
            $mail_ppal->Port = 587;
            //$mail_ppal->Port = 465;
            $mail_ppal->SMTPSecure = 'tls';
            //$mail_ppal->SMTPSecure = 'ssl';
            $mail_ppal->SMTPAuth = true;
            $mail_ppal->Username = 'academiacead@gmail.com';
            //$mail_ppal->Username = 'dmckeagan@gmail.com';
            $mail_ppal->Password = 'academiacead2018';
            //$mail_ppal->Password = 'maBCrC7CbDAR2Df';
            $mail_ppal->setFrom('academiacead@gmail.com', 'Academia CEAD');            
            //$mail_ppal->setFrom('dmckeagan@gmail.com', 'Academia CEAD');            
            $mail_ppal->addAddress($dir_correo, $usuarioX);            
            $mail_ppal->Subject = $emailSubject;            
            $mail_ppal->msgHTML($emailBody); */
            
           /* $ml = new PHPMailer();
            
            $ml->IsSMTP();
            $ml->SMTPAuth = true;
            $ml->Host = "smtp.gmail.com";
            $ml->Username = "dmckeagan@gmail.com";
            $ml->Password = "Carlosrocks";
            $ml->Port = "587";
            $ml->From = "dmckeagan@gmail.com";
            $ml->FromName = "Ing. Juan Romero";
            $ml->AddAddress("juanc.romeroruiz@hotmail.com");
            $ml->IsHTML(true);
            $ml->Subject = "Cambio de Password!!!";
            
            $ml->Body = $emailBody;
            
            $exito = $ml->Send(); */
            
            $ml = new PHPMailer();
            
            $ml->isSMTP();
            //$ml->Host = 'smtp.gmail.com';
            $ml->Host = 'smtp.gmail.com';
            $ml->Port = 587;
            $ml->SMTPAuth = true;
            $ml->Username = 'academiacead@gmail.com';
            $ml->Password = 'academia2018';
            $ml->SMTPSecure = 'tls';
            //$ml->From = 'dmckeagan@gmail.com';
            $ml->setFrom('academiacead@gmail.com', 'Academia Cead');
            //$ml->FromName = 'Ing. Juan Romero';
            $ml->addAddress($dir_correo, $usuarioX);
            $ml->isHTML(true);
            
            $ml->SMTPDebug = 0;
            $ml->Debugoutput = 'html';
            $ml->Subject = $emailSubject;
            $ml->Body = $emailBody;           

            if(!$ml->send()){
                $obj->inserta_bitacora('Error de correo', 'No se ha podido enviar el correo:'.$ml->ErrorInfo, $_SESSION['id'], 3);
                header('Location: recupera.php?msj=2&err='.$ml->ErrorInfo." <<<<< ");
            }else{
                $obj->inserta_bitacora('Envio de correo', 'Se ha enviado un correo al usuario para el cambio de pass', $_SESSION['id'], 3);
                header('Location: recupera.php?msj=3&ot='.$cod.' > Num Rows'.$numrows);
            }
        }else{
            header('Location: recupera.php?msj=1');
        }
    } catch (Exception $e){
        header('Location: recupera.php?msj=2&err='.$e->getMessage());
    }

