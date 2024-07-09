<?php


$id=$_POST["id"];
$funUsos=$_POST["funUsos"];
$desFisica=$_POST["desFisica"];
$espTecnica=$_POST["espTecnica"];
$conSeguridad=$_POST["conSeguridad"];
$alistamiento=$_POST["alistamiento"];
$verCalibracion=$_POST["verCalibracion"];
$instrucciones=$_POST["instrucciones"];
$condiciones=$_POST["condiciones"];
$mantenimiento=$_POST["mantenimiento"];
$limDesinfeccion=$_POST["limDesinfeccion"];
$conManejo=$_POST["conManejo"];




$servidor = "localhost"; //el nombre del servidor que utilizaremos en este caso utilizamos localhost
$usuario = "root"; // ususario que acabamos de crear en la base de datos
$contraseña = ""; //La contraseña del usuario que estamos utilizando
$BD = "bdagroinsoft"; //El nombre de la base de datos.


$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");


$query="SELECT fictecnica.idMaqEquipo, maqyequipo.nomElemento  FROM `fictecnica` INNER JOIN maqyequipo ON fictecnica.idMaqEquipo=maqyequipo.idMaqEquipo  WHERE fictecnica.idMaqEquipo=$id";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==true) {
	echo "<script>

alert('la maquina $fila[1] ya se le hizo una ficha tecnica')

	</script>";
}else{


$insert="INSERT INTO fictecnica ( idMaqEquipo, funUsos, desFisica, espTecnica, conSeguridad, alistamiento, verCalibracion, instrucciones, condiciones, mantenimiento, limDesinfeccion, conManejo ) VALUES ( '$id', '$funUsos', '$desFisica', '$espTecnica', '$conSeguridad', '$alistamiento', '$verCalibracion', '$instrucciones', '$condiciones', '$mantenimiento', '$limDesinfeccion', '$conManejo'   )";
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