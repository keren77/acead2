$(document).ready(function(){
	$.ajax({
		url:'php/obtenerModalidades.php',
		method: 'POST',
		dataType: 'json',
		success:function (respuesta) { 
			$('#selectModalidad').html('<option selected>Seleccione una Modalidad...</option>');
			for (var i = 0; i < respuesta.length; i++) {
			
                $('#selectModalidad').append('<option value="'+respuesta[i].Id+'">'+respuesta[i].Modalidad+'</option>');
			}
			
		},
		error:function () {
			alert('Error al cargar Modalidades');
		}
	});


	$.ajax({
		url:'php/obtenerProfesores.php',
		method: 'POST',
		dataType: 'json',
		success:function (respuesta) { 
			$('#selectProfe').html('<option selected>Seleccione un Profesor...</option>');
			for (var i = 0; i < respuesta.length; i++) {
			
                $('#selectProfe').append('<option value="'+respuesta[i].Id+'">'+respuesta[i].nombre1+' '+respuesta[i].nombre2+' '+respuesta[i].apellido1+' '+respuesta[i].apellido2+'</option>');
			}
			
		},
		error:function () {
			alert('Error al cargar Profesores');
		}
	});



	$('#selectModalidad').unbind('change').bind('change',function(e){
		$("#selectOrientacion").html('');
		$("#selectClase").html('');
		$("#verSecciones").html('');
		$("#error").html('');
		var valor=$('#selectModalidad').val();
		$.ajax({
		url:'php/obtenerOrientacion.php',
		method: 'GET',
		data: 'id='+valor,
		dataType: 'json',
		success:function (respuesta) { 
			if($('#selectModalidad').val()=='Seleccione una Modalidad...'){
				$("#selectOrientacion").html('');
				$("#selectClases").html('');
			}else{
				$('#selectOrientacion').html('<option selected>Seleccione una Orientacion...</option>');
				for (var i = 0; i < respuesta.length; i++) {
				
	                $('#selectOrientacion').append('<option value="'+respuesta[i].Id+'">'+respuesta[i].Orientacion+'</option>');
				}
			}

		},
		error:function () {
			alert('Error al cargar Orientaciones');
		}
	});
	});


	$('#selectOrientacion').unbind('change').bind('change', function (e){
    	var valor = $('#selectOrientacion').val();
   		$("#selectClase").html('');
   		$("#verSecciones").html('');
   		$("#error").html('');
   		$.ajax({
		url:'php/obtenerClases.php',
		method:'GET',
		data: 'id='+valor,
		dataType:"json",
		success:function (respuesta) {
			if($('#selectOrientacion').val()=='Seleccione una Orientacion...'){
				$("#selectClase").html('');
			}else{
				$('#selectClase').html('<option selected>Seleccione una Clase...</option>');
				for (var i = 0; i < respuesta.length; i++) {
						$("#selectClase").append('<option value="'+respuesta[i].Id+'">'+respuesta[i].Clase +'</option>');
				}
			}
			
		},
		error:function (error) {
			alert('Error al cargar Clases');
		}
	});
  });


	$('#selectClase').unbind('change').bind('change', function (e){
		obtenerSecciones();
  });





});


function obtenerSecciones(){
	    var valor = $('#selectClase').val();
   		$("#verSecciones").html('');
   		$("#error").html('');
   		$.ajax({
		url:'php/obtenerSecciones.php',
		method:'GET',
		data: 'id='+valor,
		dataType:"json",
		success:function (respuesta) {
			if($('#selectClase').val()=='Seleccione una Clase...'){
				$("#verSecciones").html('');
			}else if(respuesta==''){
				$("#verSecciones").append('<option value="0">Aun no hay secciones</option>');
			}else{
				for (var i = 0; i < respuesta.length; i++) {
					$("#verSecciones").append('<option value="'+respuesta[i].Id+'">Sec:'+respuesta[i].hora +' Duracion:'+respuesta[i].duracion+'Aula:'+respuesta[i].aula+'</option>');
				}
			}
			
		},
		error:function (error) {
			alert('Error al cargar Secciones');
		}
	});
}



$("#btn_crear").click(function(){
		var clase=$("#selectClase").val();
		var profe = $("#selectProfe").val();
		var nombre = $("#nombre").val();
		var duracion = $("#duracion").val();
		var aula = $("#aula").val();
		var valores = 'clase='+clase+'&profe='+profe+'&nombre='+nombre+'&duracion='+duracion+'&aula='+aula;

		if((clase=='Seleccione una Clase...')||(profe=='Seleccione un Profesor...')||(nombre=='')||(duracion=='')||(aula=='')){
			$("#error").html('Debe completar todos los datos');			
		}else{
			$.ajax({
				url:'php/insertarSeccion.php',
				method:'GET',
				data: valores,
				dataType:'html',
				success:function (respuesta) {
					alert(respuesta);
					obtenerSecciones();
				},
				error:function (error) {
					alert('Seccion Agregada con exito');
					obtenerSecciones();
				}
			});
		}
});


