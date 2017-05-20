
<html>
  <head>
    <title>CBTis 65</title>   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/cbmin.css">
    <link rel="shortcut icon" href="public/imagenes/logo.png">
    <link rel="stylesheet" href="private/font-awesome-4.7.0/css/font-awesome.css">
    <style type="text/css">
			body
			{
				background-image: url(public/imagenes/fondoalumno.jpg); 
				background-position: center;
				background-repeat: no-repeat; 
				background-size: cover;
			}
			body:after{
			    position:fixed;
			    content:"";
			    top:0;
			    left:0;
			    right:0;
			    bottom:0;
			    background:rgba(0,0,0,0.8);
			    z-index:-1;
			}
			.fondo
			{
				background: linear-gradient(13deg, #56f0b4, #79b1ff);
				background-size: 400% 400%;

				-webkit-animation: AnimationName 11s ease infinite;
				-moz-animation: AnimationName 11s ease infinite;
				-o-animation: AnimationName 11s ease infinite;
				animation: AnimationName 11s ease infinite;


				height: 300px;
			}
			@-webkit-keyframes AnimationName {
			    0%{background-position:76% 0%}
			    50%{background-position:25% 100%}
			    100%{background-position:76% 0%}
			}
			@-moz-keyframes AnimationName {
			    0%{background-position:76% 0%}
			    50%{background-position:25% 100%}
			    100%{background-position:76% 0%}
			}
			@-o-keyframes AnimationName {
			    0%{background-position:76% 0%}
			    50%{background-position:25% 100%}
			    100%{background-position:76% 0%}
			}
			@keyframes AnimationName { 
			    0%{background-position:76% 0%}
			    50%{background-position:25% 100%}
			    100%{background-position:76% 0%}
			}
		</style>
  </head>
  <body>
<form  method="POST" class="form-inline" role="form">
<button class="btn btn-default"><a href="/cbtis-master/index.html">Regresar <i class="fa fa-arrow-circle-left"></i></a></button>
<div class="container text-center fondo">
	<h2><span class="label label-default">Ingresa tus datos para realizar una consulta de tu información</span></h2>
	<div class="form-group">
		<div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input type="text" class="form-control" name="id_alumno" placeholder="Número de Control">       
		</div>
		<div class="input-group">
	        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	        <input type="password" class="form-control " name="contrasena" placeholder="Contraseña">
	    </div>
	</div>
	<button type="submit" name="submit" class="btn btn-primary">Realizar Consulta</button>
</form>
<?php
if(isset($_POST['submit']))
{
	$id_alumno=$_POST["id_alumno"];
	$contrasena=$_POST["contrasena"];
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
			$query="select * from loginalumno WHERE  id_alumno = ".$id_alumno." and contrasena ='".$contrasena."'";
			$resultado=$conexionMysqli->query($query);
			if ($resultado->num_rows > 0){
				$query="SELECT CONCAT(alumno.Nombre,' ', alumno.PApellido, ' ',alumno.SApellido) AS 'nombrealumno', alumno.Direccion AS 'dir', alumno.correoElectronico AS 'correo' , alumno.fechaNacimiento AS 'fecha', especialidades.nombre AS 'especialidad', concat(tutor.nombre, ' ', tutor.primer_apellido, ' ',tutor.segundo_apellido) AS 'nombretutor', loginalumno.semestreActual AS 'semestre' FROM loginalumno LEFT JOIN alumno ON loginalumno.id_alumno = alumno.id_alumno LEFT JOIN tutor ON alumno.id_tutor = tutor.Id_tutor LEFT JOIN especialidades ON alumno.id_especialidad = especialidades.id_especialidad where alumno.id_alumno=".$id_alumno;
				$resultado=$conexionMysqli->query($query);
				echo "<table  class='table table-striped table-bordered well'>";
				echo "<tr><th>Nombre Alumno</th><th>Nombre Tutor</th><th>Direccion </th><th>Semestre Actual </th><th>Correo</th><th>Fecha de nacimiento</th><th>Especialidad </th></tr>";
				while($row = $resultado->fetch_assoc()) {
				    $alumno = $row['nombrealumno'];
				    $tutor = $row['nombretutor'];
				    $direccion = $row['dir'];
				    $correo = $row['correo'];
				    $fecha = $row['fecha'];
				    $especialidad = $row['especialidad'];
				    $semestre = $row['semestre'];
				    echo "<tr><td>".$alumno."</td><td>".$tutor."</td><td>".$direccion."</td> <td>".$semestre."</td><td>".$correo."</td><td>".$fecha."</td><td>".$especialidad."</td></tr>";
				}
				echo "</table>";		 
			}
			else{
				?><h1><span class="label label-warning">Error usuario o contraseña inválidos</span></h1><?php
			}
		}	
		} catch(Exception $e){
		echo $e;
		}
}
?>
</div>
 <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>