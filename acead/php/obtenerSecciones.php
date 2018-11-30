<?php 
include 'conexion.php';
	$obj = new BaseDatos();
    $obj->Abrir_Conexion();
    $valor=$_GET['id'];
    $entro=false;
    if(isset($_GET['alumno'])){
    	$alumno=$_GET['alumno'];
    	$consulta0="SELECT * from tbl_matricula where Id_Alumno=".$alumno." and Id_Seccion= (select Id_Seccion from tbl_secciones where Id_Clase=".$valor.")";
			$stmt0 = $obj->getCONEXION()->query($consulta0);
			 if($row=mysqli_fetch_array($stmt0)){
			 	$entro=TRUE;
			 }
    }
	 if($entro){
	 	$con['Id']="matriculado";
		$stmt0->close();
	}else{
	 	$consulta = "SELECT * FROM tbl_secciones WHERE Id_Clase=".$valor." and id_PeriodoAcm = (select Id_PeriodoAcm from tbl_periodoacademico where Activo=1)";           
    		$stmt = $obj->getCONEXION()->query($consulta);
			$con=array();
			$n=0;
			while ($row=$stmt->fetch_row()) {
				$con[$n]['Id']=$row[0];
				$con[$n]['hora']=$row[1];
				$con[$n]['duracion']=$row[2];
				$con[$n]['aula']=$row[3];
				$n++;
			}
			
			$stmt->close();
	}

	echo json_encode($con,JSON_UNESCAPED_UNICODE);

 ?>