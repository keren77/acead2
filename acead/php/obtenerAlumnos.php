<?php 
include 'conexion.php';
	$obj = new BaseDatos();
    $obj->Abrir_Conexion();

    		$consulta = "SELECT * FROM tbl_alumnos";           
    		$stmt = $obj->getCONEXION()->query($consulta);
			$con=array();
			$n=0;
			while ($row=$stmt->fetch_row()) {
				$con[$n]['Id']=$row[0];
				$con[$n]['PrimerNombre']=$row[1];
				$con[$n]['SegundoNombre']=$row[2];
				$con[$n]['PrimerApellido']=$row[3];
				$con[$n]['SegundoApellido']=$row[4];
				$n++;
			}
			echo json_encode($con,JSON_UNESCAPED_UNICODE);
			$stmt->close();
 ?>