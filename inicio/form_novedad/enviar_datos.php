<?php


$id=$_POST["id"];
$tipNovedad=$_POST["tipNovedad"];
$fecNovedad=$_POST["fecNovedad"];
$perNovedad=$_POST["perNovedad"];
$cedPerNovedad=$_POST["cedPerNovedad"];
$espNovedad=$_POST["espNovedad"];
$prioridad=$_POST["prioridad"];


$servidor = "localhost"; //el nombre del servidor que utilizaremos en este caso utilizamos localhost
$usuario = "root"; // ususario que acabamos de crear en la base de datos
$contraseña = ""; //La contraseña del usuario que estamos utilizando
$BD = "bdagroinsoft"; //El nombre de la base de datos.



$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");
$query="SELECT novedades.idNovedad,maqyequipo.nomElemento FROM `novedades` INNER JOIN maqyequipo ON novedades.idMaqEquipo=maqyequipo.idMaqEquipo WHERE novedades.idMaqEquipo=$id AND novedades.tipNovedad='$tipNovedad' AND novedades.fecNovedad='$fecNovedad' ";
$resource=mysqli_query($conexion,$query);
$fila2=mysqli_fetch_row($resource);
if ($fila2==true) {


echo "<script>

alert('ya  se le hizo una novedad  a la maquina $fila2[1] y el tipo es  $tipNovedad fue realizada en la fecha de hoy ($fecNovedad)')


</script>";
}else{





$query="SELECT novedades.idNovedad,maqyequipo.nomElemento FROM novedades INNER JOIN maqyequipo ON novedades.idMaqEquipo=maqyequipo.idMaqEquipo  WHERE novedades.idMaqEquipo=$id AND novedades.fecNovedad='$fecNovedad' ";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_num_rows($resource);
$fila1=mysqli_fetch_row($resource);

if ($fila<=4) {
$insert="INSERT INTO novedades ( idMaqEquipo, tipNovedad, fecNovedad, perNovedad, cedPerNovedad, espNovedad, prioridad ) VALUES ( '$id', '$tipNovedad','$fecNovedad', '$perNovedad', '$cedPerNovedad', '$espNovedad', '$prioridad'   )";
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

}else{


	echo "<script>

alert(' la maquina $fila1[1] ya se le han hecho 5 novedades en el dia de hoy ($fecNovedad)');

	</script>";
}

}







?>