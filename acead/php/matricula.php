<?php 
include 'conexion.php';
	$obj = new BaseDatos();
    $obj->Abrir_Conexion();
    $seccion=$_GET['seccion'];
    $alumno=$_GET['alumno'];
    $consulta="INSERT INTO tbl_matricula (Id_Alumno, Id_Seccion, Id_PeriodoAcm) VALUES ('$alumno', '$seccion', (SELECT Id_PeriodoAcm FROM tbl_periodoacademico where activo = 1))";
	$stmt = $obj->getCONEXION()->query($consulta);
	$con='Matricula exitosa';
	echo $con;
	$stmt->close();
?>