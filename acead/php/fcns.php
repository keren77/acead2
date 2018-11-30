<?php
    
    header("Content-Type: text/html;charset=utf-8");
    require 'conexion.php';
    require 'db.php';
    session_start();
    
    $funcion = filter_input(INPUT_GET, 'modo');
    
    switch ($funcion){
        case 'recuperaclave':
            recupera_clave();
            break;
    }
    
    function recupera_clave(){
        if(isset($_POST['mailsend'])){
            if(!empty($_POST['mailsend'])){
                //echo 'No esta vacio!!!';
                $recuperar = new basedatos();
                $recuperar->clavePerdida();
            }else{
                header("Location: ../index.php");
            }
        }else{
            echo 'No esta definido!!!';
        }
    }


    
   /* function enviarEmail($email, $nombre, $asunto, $cuerpo) {
        require_once '../phpmailermaster/src/PHPMailer.php';

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->isSMTP = true;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tipo de seguridad'; //Modificar
        $mail->Host = 'dominio'; //Modificar
        $mail->Port = puerto; //Modificar

        $mail->Username = 'correo emisor'; //Modificar
        $mail->Password = 'password de correo emisor'; //Modificar

        $mail->setFrom('correo emisor', 'nombre de correo emisor'); //Modificar
        $mail->addAddress($email, $nombre);

        $mail->Subject = $asunto;
        $mail->Body = $cuerpo;
        $mail->IsHTML(true);

        if ($mail->send())
            return true;
        else
            return false;
    }*/
