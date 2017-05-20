<?php
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
			$query="select concat(alumno.Nombre, ' ', alumno.PApellido, ' ', alumno.SApellido) as 'Nombre Alumno', concat(tutor.nombre, ' ', tutor.primer_apellido) as 'Nombre Tutor', alumno.direccion, loginalumno.semestreActual as 'Semestre Actual' from alumno left join tutor on alumno.id_tutor = tutor.Id_tutor left join loginalumno on alumno.id_alumno = loginalumno.id_alumno where alumno.id_alumno=".$id_alumno;
			$resultado=$conexionMysqli->query($query);
			echo "<table>";
			echo "<tr><th>Nombre Alumno</th><th>Nombre Tutor</th><th>Direccion </th><th>Semestre Actual </th></tr>";
			while($row = $resultado->fetch_assoc()) {
			    $alumno = $row['Nombre Alumno'];
			    $tutor = $row['Nombre Tutor'];
			    $direccion = $row['direccion'];
			    $semestre = $row['Semestre Actual'];
			    echo "<tr><td style='width: 200px;'>".$alumno."</td><td style='width: 200px;'>".$tutor."</td><td style='width: 200px;'>".$direccion."</td> <td style='width: 200px;'>".$semestre."</td></tr>";
			}		 
		}
		else{
			?><div class="text-center text-danger"><p>Error</p></div><?php
		}
	}	
} catch(Exception $e){
	echo $e;
}
?>