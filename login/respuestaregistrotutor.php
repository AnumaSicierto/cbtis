<?php
$nombre=$_POST["nombre"];
$papellido=$_POST["papellido"];
$sapellido=$_POST["sapellido"];
$telefono=$_POST["telefono"];
$direccion=$_POST["direccion"];
$ocupacion=$_POST["ocupacion"];
$edad=$_POST["edad"];
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
		$query="insert into tutor (nombre, primer_apellido, segundo_apellido, telefono, Direccion, ocupacion,edad, correo_electronico) values('".$nombre."','".$papellido."','".$sapellido."',".$telefono.",'".$direccion."','".$ocupacion."','".$edad."','".$correo_electronico."')";
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