<?php


	 $nomElemento=$_REQUEST["nomElemento"];
     $codInventario=$_REQUEST['codInventario'];
     $codInterno=$_REQUEST['codInterno'];
     $marElemento=$_REQUEST['marElemento'];
     $seriale=$_REQUEST['seriale'];
     $modelo=$_REQUEST['modelo'];
     $capacidad=$_REQUEST['capacidad'];
     $fecAdquisicion=$_REQUEST['fecAdquisicion'];
     $idUbicacion=$_REQUEST['idUbicacion'];
     $estElemento=$_REQUEST['estElemento'];
     $idCuentadante=$_REQUEST['idCuentadante'];
     $numFicTecnica=$_REQUEST['numFicTecnica'];
     $idClasificacion=$_REQUEST['idClasificacion'];


$servidor = "localhost"; //el nombre del servidor que utilizaremos en este caso utilizamos localhost
$usuario = "root"; // ususario que acabamos de crear en la base de datos
$contraseña = ""; //La contraseña del usuario que estamos utilizando
$BD = "bdagroinsoft"; //El nombre de la base de datos.


$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");

$insert="DELETE FROM `maqyequipo` WHERE codInterno='$codInterno'";
$respuesta=mysqli_query($conexion,  $insert)  or die ("problemas al insertar");




if ($respuesta==true) {
	echo "<script>

alert('REGISTRO ELIMINADO');


	</script>";
}else{

	echo "<script>

alert('REGISTRO NO ELIMINADO');


	</script>";
}

if($respuesta==true){
  header("Location:maqyequipo.php");
}

?>