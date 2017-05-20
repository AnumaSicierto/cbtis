function capturaDatosDocente(){
	console.log("Realizando Registro");
	var url = "respuestaregistrodocente.php";
	$.post(url,{id_docente:$("#id_docente").val(),
				nombre:$("#nombre").val(),
				papellido:$("#papellido").val(),
				sapellido:$("#sapellido").val(),
				direccion:$("#direccion").val(),
				correo_electronico:$("#correo_electronico").val(),
				usuario:$("#usuario").val(),
				contrasenia:$("#contrasenia").val(),
				},
				function(data){
					$("#respuesta").html(data);
				}
	);

}