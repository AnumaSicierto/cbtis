function capturaDatosAlumno(){
	console.log("Realizando Registro");
	var url = "respuestaregistroalumno.php";
	$.post(url,{nombre:$("#nombre").val(),
				papellido:$("#papellido").val(),
				sapellido:$("#sapellido").val(),
				id_tutor:$("#id_tutor").val(),
				id_especialidad:$("#id_especialidad").val(),
				semestre:$("#semestre").val(),
				direccion:$("#direccion").val(),
				correo:$("#correo").val(),
				urlfb:$("#urlfb").val(),
				fecha:$("#fecha").val(),
				usuario:$("#usuario").val(),
				contrasenia:$("#contrasenia").val(),
				},
				function(data){
					$("#respuesta").html(data);
					console.log(data);
				}

	);
}