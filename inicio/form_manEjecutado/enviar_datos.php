<?php


$id_mantenimiento_programado=$_POST["id_mantenimiento_programado"];
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
$query="SELECT * FROM `manejecutado` WHERE id=$id_mantenimiento_programado";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_num_rows($resource);
if ($fila>0) {
	
	echo "<script>

alert('Mantenimiento Ya ejecutado')
	</script>";
}else{


	

$insert="INSERT INTO manejecutado ( id, idTipMantenimiento, idProveedor, fecEjecutado, procedimiento, recomendaciones, garantia, nomPerMantenimiento, cedPerMantenimiento ) VALUES ( '$id_mantenimiento_programado', '$idTipMantenimiento', '$idProveedor', '$fecEjecutado', '$procedimiento', '$recomendaciones', '$garantia', '$nomPerMantenimiento', '$cedPerMantenimiento'   )";
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