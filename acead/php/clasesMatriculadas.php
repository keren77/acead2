<?php 
include 'conexion.php';
			$obj = new BaseDatos();
		    $obj->Abrir_Conexion();
    		$consulta = "SELECT ALU.PrimerNombre, ALU.PrimerApellido, MO.DescripModalidad, 
							ORI.Nombre , CLA.DescripClase, SEC.DescripSeccion , SEC.AulaClase , SEC.HraClase
							FROM tbl_alumnos ALU, tbl_modalidades MO, tbl_orientacion ORI,
							tbl_clases CLA, tbl_secciones SEC, tbl_matricula MA
							WHERE (ALU.Id_Alumno=MA.Id_Alumno) AND (MA.Id_Seccion=SEC.Id_Seccion)
							AND (SEC.Id_Clase=CLA.Id_Clase) AND (CLA.Id_orientacion=ORI.Id_orientacion)
							AND (ORI.Id_modalidad=MO.Id_modalidad)";           
    		$stmt = $obj->getCONEXION()->query($consulta);
			$con=array();
			$n=0;
			while ($row=$stmt->fetch_row()) {
				$con[$n]['AlumnoN']=$row[0];
				$con[$n]['AlumnoA']=$row[1];
				$con[$n]['Modalidad']=$row[2];
				$con[$n]['Orientacion']=$row[3];
				$con[$n]['Clase']=$row[4];
				$con[$n]['Seccion']=$row[5];
				$con[$n]['Aula']=$row[6];
				$con[$n]['Duracion']=$row[7];
				$n++;
			}
			echo json_encode($con,JSON_UNESCAPED_UNICODE);
			$stmt->close();
 ?>