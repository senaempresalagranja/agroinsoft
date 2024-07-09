<?php


$id=$_POST["id"];
$fecSalida=$_POST["fecSalida"];
$fecLimRegreso=$_POST["fecLimRegreso"];
$idProveedor=$_POST["idProveedor"];
$idUbicacion=$_POST["idUbicacion"];
$idCuentadante=$_POST["idCuentadante"];
$destino=$_POST["destino"];


$servidor = "localhost"; //el nombre del servidor que utilizaremos en este caso utilizamos localhost
$usuario = "root"; // ususario que acabamos de crear en la base de datos
$contraseña = ""; //La contraseña del usuario que estamos utilizando
$BD = "bdagroinsoft"; //El nombre de la base de datos.


$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");
$query="SELECT * FROM `salidas` WHERE `idMaqEquipo`=4 AND`fecSalida` BETWEEN '$fecSalida' AND '$fecLimRegreso'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==true) {
	echo "<script>
alert('la maquina se encuentra  fuera de las instalaciones');

	</script>";
}else{

$insert="INSERT INTO salidas ( idMaqEquipo, fecSalida, fecLimRegreso, idProveedor, idUbicacion, idCuentadante, destino ) VALUES ( '$id', '$fecSalida', '$fecLimRegreso', '$idProveedor', '$idUbicacion', '$idCuentadante', '$destino'   )";
$respuesta=mysqli_query($conexion,  $insert)  or die ("problemas al insertar");



if ($respuesta==true) {
	echo "<script>

alert('REGISTRO INSERTADO');


	</script>";
}else{

	echo "<script>

alert('REGISTRO NO INSERTADO');


	</script>";
}
	
}











?>