<?php

        $id_maquina=$_POST["id_maquina"];
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

$insert="DELETE FROM `fictecnica` WHERE idMaqEquipo='$id_maquina'";
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
  header("Location:FichaTecnica.php");
}

?>