<?php
	error_reporting(E_ALL);
	$servidor="localhost";
	$basedatos="escuela";
	$usuario="hector";
	$contrasenia="Admin123";

	try
	{
		$conexionMysqli= new mysqli($servidor,$usuario,$contrasenia,$basedatos);
		if ($conexionMysqli->connect_errno){
				echo "Fallo la conexión con MySQL:(" . $conexionMysqli->conect_errno . ")" . $conexionMysqli->connect_error;
			}
		else
		{
			?>
			<div class="container well">
				<div class="panel panel-info">
					<div class="panel-heading"><div class="panel-title">Registro de alumnos</div></div>
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
								<p>Tutor</p>
								<select id="id_tutor" class="form-control">
								 	<?php
								 	$query="SELECT concat(nombre, ' ' , primer_apellido, ' ', segundo_apellido) as 'tutor', Id_tutor as 'id'  FROM tutor";
									$resultado=$conexionMysqli->query($query);
									while($row = $resultado->fetch_assoc()) {
										$tutor= $row['tutor'];
										$id=$row['id'];
									?>
									<option value='<?php echo $id;?>'><?php echo $tutor; ?></option>
									<?php
								}?>
								</select>
							</div>
							<div class="col-xs-6">
								<p>Especialidad</p>
								<select id="id_especialidad" class="form-control">
								 	<?php
								 	$query="SELECT id_especialidad as 'id', nombre  FROM especialidades";
									$resultado=$conexionMysqli->query($query);
									while($row = $resultado->fetch_assoc()) {
										$nombre= $row['nombre'];
										$id=$row['id'];
									?>
									<option value='<?php echo $id;?>'><?php echo $nombre; ?></option>
									<?php
								}?>
								</select>
							</div>
							<div class="col-xs-6">
								<p>Semestre</p>
								<input class="form-control" type="number"  id="semestre" maxlength="3">
							</div>
							<div class="col-xs-6">
								<p>Direccion</p>
								<input class="form-control" type="text"  id="direccion" maxlength="300">
							</div>
							<div class="col-xs-6">
								<p>Correo Electrónico</p>
								<input class="form-control" type="text" id="correo" maxlength="50">
							</div>
							<div class="col-xs-6">
								<p>Direccion de Facebook</p>
								<input class="form-control" type="text"  id="urlfb" maxlength="50">
							</div>
							<div class="col-xs-6">
								<p>Fecha de nacimiento</p>
								<input type="date" id="fecha">
							</div>
							<div class="row"><div class="col-xs-11 text-center"></div><div class="col-xs-1">
							<button class="btn btn-info" onclick="capturaDatosAlumno()" name="bot">Enviar
							</button></div></div>
						</form>
					</div>
				</div>
			</div>
			<div id="respuesta">
			</div>
			<script type="text/javascript" src="registroalumnos.js"></script>
			<?php
		exit();
		}	
	} catch(Exception $e){
	echo $e;
	}
?>