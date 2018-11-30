<?php 
    include 'conexion.php';
    include 'start_sess.php';
    
    $obj = new BaseDatos();
    $obj->Abrir_Conexion();

    if ((isset($_POST['user']))&&(isset($_POST['pass']))) {

            $user=inputSeguro($obj->getCONEXION(),$_POST['user']);
            $pass=inputSeguro($obj->getCONEXION(),$_POST['pass']);
            
            $consulta = "SELECT * FROM TBL_Usuarios WHERE Usuario='".$user."'";           
            $stmt = $obj->getCONEXION()->query($consulta);
            
            if(($row=mysqli_fetch_array($stmt))&&(password_verify($_POST['pass'],$row['Contrasena']))){
                
                $_SESSION['id']=$row['Id_usuario'];
                $_SESSION['nombre']=$row['Usuario'];
                $_SESSION['correo']=$row['CorreoElectronico'];
                $_SESSION['estado']=$row['Id_Estado'];
                $_SESSION['rol']=$_row['Id_Rold'];
                if($_SESSION['estado']==1){
                        $obj->inserta_bitacora('Acceso al sistema', 'Accediendo al sistema por primera vez', $_SESSION['id'], 1);
                        header("Location: ../preguntas.php");
                }elseif($_SESSION['estado']==2){
                        header("Location: ../index.php?error=2");
                }elseif($_SESSION['estado']==3){
                        $obj->inserta_bitacora('Acceso al sistema', 'Accediendo al sistema', $_SESSION['id'], 1);
                        header("Location: ../home.php");
                }elseif($_SESSION['estado']==4){
                        header("Location: ../index.php?error=2");
                }
            }
            else{
                    $_SESSION['intentos']+=1;                    
                    header("Location: ../index.php?error=1");
            }
            //session_start();
            
            $mysqli->close();
            
    }else{
            header("Location: ../index.php");
    }



    function inputSeguro($conexion,$post)
    {
        $input = htmlentities($post);
        $seguro = mysqli_real_escape_string ($conexion,$input);
        return $seguro;
    }

