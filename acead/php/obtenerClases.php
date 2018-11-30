<?php 
include 'conexion.php';
	$obj = new BaseDatos();
    $obj->Abrir_Conexion();
    $valor=$_GET['id'];
    		$consulta = "SELECT * FROM tbl_clases WHERE Id_orientacion=".$valor;           
    		$stmt = $obj->getCONEXION()->query($consulta);
			$con=array();
			$n=0;
			while ($row=$stmt->fetch_row()) {
				$con[$n]['Id']=$row[0];
				$con[$n]['Clase']=$row[1];
				$n++;
			}
			echo json_encode($con,JSON_UNESCAPED_UNICODE);
			$stmt->close();
 ?>