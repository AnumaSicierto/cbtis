<?php
$nombre=utf8_decode($_POST["nombre"]);
$papellido=utf8_decode($_POST["papellido"]);
$sapellido=utf8_decode($_POST["sapellido"]);
$id_tutor=utf8_decode($_POST["id_tutor"]);
$id_especialidad=utf8_decode($_POST["id_especialidad"]);
$semestre=utf8_decode($_POST["semestre"]);
$direccion=utf8_decode($_POST["direccion"]);
$correo=utf8_decode($_POST["correo"]);
$urlfb=utf8_decode($_POST["urlfb"]);
$fecha=utf8_decode($_POST["fecha"]);
error_reporting(E_ALL);
$servidor="localhost";
$basedatos="escuela";
$usuario=$_POST['usuario'];
$contrasenia=$_POST['contrasenia'];

try
{
	$conexionMysqli= new mysqli($servidor,$usuario,$contrasenia,$basedatos);
	if ($conexionMysqli->connect_errno){
			echo "Fallo la conexión con MySQL:(" . $conexionMysqli->conect_errno . ")" . $conexionMysqli->connect_error;
		}
	else
	{
		$query="insert into alumno (Nombre, PApellido, SApellido, id_tutor, id_especialidad, Direccion, correoElectronico,fechaNacimiento, direccionFacebook) values('".$nombre."','".$papellido."','".$sapellido."',".$id_tutor.",".$id_especialidad.",'".$direccion."','".$correo."','".$fecha."','".$urlfb."')";
		$resultadoQuery=$conexionMysqli->query($query);
		if ($resultadoQuery){
			$query="SELECT MAX(id_alumno) as 'id' FROM alumno";
			$resultado=$conexionMysqli->query($query);
			while($row = $resultado->fetch_assoc()) {
				$id_alumno=$row['id'];
			}
			$campocontra= substr ($nombre ,0,2).substr ($papellido ,0,1).substr ($sapellido ,0,1).$id_tutor.$id_especialidad.$id_alumno;
			echo $id_alumno;
			$sql="insert into loginalumno (id_alumno, contrasena, semestreActual)  values (".$id_alumno.",'".$campocontra."', ".$semestre.")";
			echo $sql;
			$resultadoSQL=$conexionMysqli->query($sql);
			if ($resultadoSQL) {
				echo "Exito";
			}
			
		}
		else{
			echo "Error no se pudo insertar";
		}
	}	
} catch(Exception $e){
	echo $e;
}
?>