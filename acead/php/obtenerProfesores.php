<?php 
include 'conexion.php';
			$obj = new BaseDatos();
		    $obj->Abrir_Conexion();
    		$consulta = "SELECT * FROM tbl_personal";           
    		$stmt = $obj->getCONEXION()->query($consulta);
			$con=array();
			$n=0;
			while ($row=$stmt->fetch_row()) {
				$con[$n]['Id']=$row[0];
				$con[$n]['nombre1']=$row[1];
				$con[$n]['nombre2']=$row[2];
				$con[$n]['apellido1']=$row[3];
				$con[$n]['apellido2']=$row[4];
				$n++;
			}
			echo json_encode($con,JSON_UNESCAPED_UNICODE);
			$stmt->close();
 ?>