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
		//Obtener el valor del ultimo alumno
		$query="SELECT MAX(id_alumno) as 'id' FROM alumno";
		$resultado=$conexionMysqli->query($query);
		?>
		<select name="valuelist">
		<?php
		while($row = $resultado->fetch_assoc()) {
			$nombre= $row['nombre'];
			$id=$row['id'];
			?>
			<option value="valuelist" name="nurse_name" value='<?php echo $id;?>'><?php echo $nombre; ?></option>
			<?php
		}
		echo utf8_decode("Conexi&oacute;n Habilitada");
		exit();
	}	
} catch(Exception $e){
	echo $e;
}
?>
