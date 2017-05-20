function capturaDatosTutor(){
	console.log("Realizando Registro");
	var url = "respuestaregistrotutor.php";
	$.post(url,{nombre:$("#nombre").val(),
				papellido:$("#papellido").val(),
				sapellido:$("#sapellido").val(),
				telefono:$("#telefono").val(),
				direccion:$("#direccion").val(),
				ocupacion:$("#ocupacion").val(),
				edad:$("#edad").val(),
				correo_electronico:$("#correo_electronico").val(),
				usuario:$("#usuario").val(),
				contrasenia:$("#contrasenia").val(),
				},
				function(data){
					$("#respuesta").html(data);
					console.log(data);
				}

	);

}