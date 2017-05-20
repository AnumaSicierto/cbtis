<?php
$nombre=$_POST["nombre"];
$papellido=$_POST["papellido"];
$sapellido=$_POST["sapellido"];
$direccion=$_POST["direccion"];
$correo_electronico=$_POST["correo_electronico"];
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
		echo utf8_decode("Conexi&oacute;n Habilitada");
		$query="insert into docente (nombre, PApeliido, SApellido, Direccion, correo) values('".$nombre."','".$papellido."','".$sapellido."','".$direccion."','".$correo_electronico."')";
		$resultado=$conexionMysqli->query($query);
		if ($resultado){
			?><div class="text-center text-success"><p>exito se inserto</p></div>
			<?php
		}
		else{
			?><div class="text-center text-danger"><p>Error/p></div><?php
		}
	}	
} catch(Exception $e){
	echo $e;
}
?>