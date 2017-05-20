<html>
	<head>
		<link rel="stylesheet" href="/cbtis-master/css/bootstrap.css">
		<link rel="stylesheet" href="/cbtis-master/private/font-awesome-4.7.0/css/font-awesome.css">
		<link rel="stylesheet" href="/cbtis-master/css/sreg.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
	</head>
	<body>
<?php
error_reporting(E_ALL);
$servidor="localhost";
$basedatos="escuela";
$usuario=$_REQUEST['usuario'];
$contrasenia=$_REQUEST['contra'];

try
{
	$conexionMysqli= new mysqli($servidor,$usuario,$contrasenia,$basedatos);
	if ($conexionMysqli->connect_errno){
			echo "<h1><span class='label label-danger'>Fallo la conexión con MySQL:( usuario o contraseña incorrectos)</span></h1>";
		}
	else
	{
		echo utf8_decode("Conexi&oacute;n Habilitada");
		header('Location: inicio.html?usuario='.$usuario); 
		exit();
	}	
} catch(Exception $e){
	//echo $e;
}
?>
<script type="text/javascript" src="/cbtis-master/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="/cbtis-master/js/bootstrap.js"></script>
</body>
</html>
