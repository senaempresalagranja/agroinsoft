<?php


$id_mantenimiento_programado=$_POST["id_mantenimiento_programado"];
$id_mantenimiento_ejecutado=$_POST["id_mantenimiento_ejecutado"];
$idTipMantenimiento=$_POST["idTipMantenimiento"];
$idProveedor=$_POST["idProveedor"];
$fecEjecutado=$_POST["fecEjecutado"];
$procedimiento=$_POST["procedimiento"];
$recomendaciones=$_POST["recomendaciones"];
$garantia=$_POST["garantia"];
$nomPerMantenimiento=$_POST["nomPerMantenimiento"];
$cedPerMantenimiento=$_POST["cedPerMantenimiento"];


$servidor = "localhost"; //el nombre del servidor que utilizaremos en este caso utilizamos localhost
$usuario = "root"; // ususario que acabamos de crear en la base de datos
$contraseña = ""; //La contraseña del usuario que estamos utilizando
$BD = "bdagroinsoft"; //El nombre de la base de datos.


$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");

$sql="UPDATE manejecutado SET id='$id_mantenimiento_programado',  idTipMantenimiento='$idTipMantenimiento', idProveedor='$idProveedor', fecEjecutado='$fecEjecutado', procedimiento='$procedimiento', recomendaciones='$recomendaciones', garantia='$garantia', nomPerMantenimiento='$nomPerMantenimiento', cedPerMantenimiento='$cedPerMantenimiento'  where idManEjecutado='$id_mantenimiento_ejecutado' ";
		
$cs=mysqli_query($conexion, $sql);

if ($cs==true) {
	echo "<script>

alert('REGISTRO ACTUALIZADO');


	</script>";
}else{

	echo "<script>

alert('REGISTRO NO ACTUALIZADO');


	</script>";
}


if($respuesta==true){
  header("Location:manEjecutado.php");
}





?>