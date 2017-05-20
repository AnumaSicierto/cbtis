<?php
	$usuario="hector";
	$contrasenia="Admin123";
?>
<div class="container well">
	<div class="panel panel-info">
		<div class="panel-heading"><div class="panel-title">Registro de Docente</div></div>
		<div class="panel-body ">
			<form method="post" role="form" action="">
				<input type="hidden" id="usuario" value="<?php echo $usuario;?>">
				<input type="hidden" id="contrasenia" value="<?php echo $contrasenia;?>">
				<div class="col-xs-6">
					<p>Nombre</p>
					<input class="form-control" type="text" id="nombre" maxlength="50">
				</div>
				<div class="col-xs-6">
					<p>Primer Apellido</p>
					<input class="form-control" type="text"  id="papellido" maxlength="50">
				</div>
				<div class="col-xs-6">
					<p>Segundo Apellido</p>
					<input class="form-control" type="text"  id="sapellido" maxlength="50">
				</div>
				<div class="col-xs-6">
					<p>Direccion</p>
					<input class="form-control" type="text"  id="direccion" maxlength="300">
				</div>
				<div class="col-xs-6">
					<p>Correo Electrónico</p>
					<input class="form-control" type="text" id="	correo_electronico" maxlength="50">
				</div>
				<div class="row"><div class="col-xs-11 text-center"></div><div class="col-xs-1"><input class="btn btn-info" onclick="capturaDatosDocente()" type="submit" name="bot"></div></div>
			</form>
		</div>
	</div>
</div>
<div id="respuesta">
</div>
<script type="text/javascript" src="registrodocente.js"></script>