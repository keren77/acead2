<?php 
    @session_start();
    
    include 'conexion.php';
    
    $obj = new BaseDatos();
    $obj->Abrir_Conexion();
    
    $obj->inserta_bitacora('Salida', 'Cerrando la sesion en el sistema', $_SESSION['id'], 7);
    
    session_destroy();
    header("Location: ../index.php");
