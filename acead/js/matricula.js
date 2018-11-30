$(document).ready(function(){

	CargarClasesMatricula();
	//llenar select de alumnos
	$.ajax({
		url:'php/obtenerAlumnos.php',
		method: 'POST',
		dataType: 'json',
		success:function (respuesta) { 
			$('#alumnos').html('<option selected>Seleccione un alumno...</option>');
			for (var i = 0; i < respuesta.length; i++) {
			
                $('#alumnos').append('<option value="'+respuesta[i].Id+'">'+respuesta[i].PrimerNombre+' '
                	+respuesta[i].SegundoNombre+' '+respuesta[i].PrimerApellido+' '
                	+respuesta[i].SegundoApellido+'</option>');
			}
			
		},
		error:function () {
			alert('Error al cargar Alumnos');
		}
	});

	

	

	$('#alumnos').unbind('change').bind('change',function(e){
		$('#modalidades').html('');
		$("#adicionar1").html('');
   		$("#adicionar2").html('');
   		$("#adicionar3").html('');
   		$('#error').html('');
		//llenar select de modalidades
	if($('#alumnos').val()!='Seleccione un alumno...'){
		$.ajax({
		url:'php/obtenerModalidades.php',
		method: 'POST',
		dataType: 'json',
		success:function (respuesta) { 
				$('#modalidades').html('<option selected>Seleccione una modalidad...</option>');
				for (var i = 0; i < respuesta.length; i++) {
				
	                $('#modalidades').append('<option value="'+respuesta[i].Id+'">'+respuesta[i].Modalidad+'</option>');
				}

		},
		error:function () {
			alert('Error al cargar Modalidades');
		}
	});
	}
	
	});


	$('#modalidades').unbind('change').bind('change',function(e){
		$("#adicionar1").html('');
		$("#adicionar2").html('');
   		$("#adicionar3").html('');
   		$('#error').html('');
		var valor=$('#modalidades').val();
		$.ajax({
		url:'php/obtenerOrientacion.php',
		method: 'GET',
		data: 'id='+valor,
		dataType: 'json',
		success:function (respuesta) { 
				for (var i = 0; i < respuesta.length; i++) {
				
	                $('#adicionar1').append('<option value="'+respuesta[i].Id+'">'+respuesta[i].Orientacion+'</option>');
				}

		},
		error:function () {
			alert('Error al cargar Orientaciones');
		}
	});
	});


	//combo dependiente 1
	$('#adicionar1').unbind('change').bind('change', function (e){
    	var valor = $('#adicionar1').val();
   		$("#adicionar2").html('');
   		$("#adicionar3").html('');
   		$('#error').html('');
   		$.ajax({
		url:'php/obtenerClases.php',
		method:'GET',
		data: 'id='+valor,
		dataType:"json",
		success:function (respuesta) {
			for (var i = 0; i < respuesta.length; i++) {
					$("#adicionar2").append('<option value="'+respuesta[i].Id+'">'+respuesta[i].Clase +'</option>');
			}
		},
		error:function (error) {
			alert('Error al cargar Clases');
		}
	});
   		$("#btn_matricular").attr('hidden',true);
  });

	//combo dependiente 2
	 	$('#adicionar2').unbind('change').bind('change', function (e){
    	var valor = $('#adicionar2').val();
    	var alumno = $('#alumnos').val();
   		$("#adicionar3").html('');
   		$('#error').html('');
   		$.ajax({
		url:'php/obtenerSecciones.php',
		method:'GET',
		data: 'id='+valor+'&alumno='+alumno,
		dataType:"json",
		success:function (respuesta) {
			if(respuesta.Id=='matriculado'){
				$('#error').html('ESTA CLASE YA ESTA MATRICULADA');
			}else if(respuesta==''){
				$('#error').html('AUN NO HAY SECCIONES PARA ESTA CLASE');
			}else{
				for (var i = 0; i < respuesta.length; i++) {
				$("#adicionar3").append('<option value="'+respuesta[i].Id+'">Sec:'+respuesta[i].hora +' Duracion:'+respuesta[i].duracion+'Aula:'+respuesta[i].aula+'</option>');
				}
			}
		},
		error:function (error) {
			alert('Error al cargar Secciones');
		}
	});
	});

	 	//combo dependiente 3
	$('#adicionar3').unbind('change').bind('change', function (e){
    	$('#valorSeccion').val($('#adicionar3').val());
   		$("#btn_matricular").attr('hidden',false);
  });


	


});


$("#btn_matricular").click(function(){
	var seccion = $('#valorSeccion').val();
	var alumno = $('#alumnos').val();
	var valores= 'seccion='+seccion+'&alumno='+alumno;
	$.ajax({
				url:'php/matricula.php',
				method:'GET',
				data: valores,
				dataType:'html',
				success:function (respuesta) {
					alert(respuesta);
					CargarClasesMatricula();
				},
				error:function (error) {
					alert('Matricula Exitosa')
					CargarClasesMatricula();
				}
			});
});


function CargarClasesMatricula() {
	$.ajax({
		url:'php/clasesMatriculadas.php',
		method:'POST',
		dataType:"json",
		success:function (respuesta) {
			$("#clasesMatricular").html('');
			for (var i = 0; i < respuesta.length; i++) {
				$("#clasesMatricular").append('<tr>'+
                  '<td>'+respuesta[i].AlumnoN+' '+respuesta[i].AlumnoA+'</td>'+
                  '<td>'+respuesta[i].Modalidad+'</td>'+
                  '<td>'+respuesta[i].Orientacion+'</td>'+
                  '<td>'+respuesta[i].Clase+'</td>'+
                  '<td>'+respuesta[i].Seccion+'</td>'+
                  '<td>'+respuesta[i].Aula+'</td>'+
                  '<td>'+respuesta[i].Duracion+'</td>'+
                  '<td><button type="button" class="btn btn-danger" onclick=""><i class="fas fa-times"></i></button></td>'+
               	'</tr>');
			}
		},
		error:function (error) {
			alert('Error al cargar clases');
		}
	});
}

