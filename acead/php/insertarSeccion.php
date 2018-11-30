<?php 
include 'conexion.php';
	$obj = new BaseDatos();
    $obj->Abrir_Conexion();
    $clase=$_GET['clase'];
    $profe=$_GET['profe'];
    $nombre=$_GET['nombre'];
    $duracion=$_GET['duracion'];
    $aula=$_GET['aula'];

    $consulta="INSERT INTO tbl_secciones (DescripSeccion, HraClase, AulaClase, Id_Clase, Id_Empleado, Id_PeriodoAcm) VALUES ('$nombre', '$duracion', '$aula', '$clase', '$profe', (SELECT Id_PeriodoAcm FROM tbl_periodoacademico where activo = 1))";
	$stmt = $obj->getCONEXION()->query($consulta);
	$con='Seccion agregada con exito';
	echo $con;
	$stmt->close();
?>