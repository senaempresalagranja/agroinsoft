<?php
include 'funciones.php';

// incluimos el archivo de configuracion
include 'config.php';
$codInterno1=$_POST["codInterno1"];
$title=$_POST["title"];
$body=$_POST["body"];
$fro=$_POST["fro"];
$to=$_POST["to"];
$tipo=$_POST["tipo"];

        $inicio =$_POST['start'];
        // y la formateamos con la funcion _formatear

        $final  =$_POST['end'];


$servidor = "localhost"; //el nombre del servidor que utilizaremos en este caso utilizamos localhost
$usuario = "root"; // ususario que acabamos de crear en la base de datos
$contraseña = ""; //La contraseña del usuario que estamos utilizando
$BD = "bdagroinsoft"; //El nombre de la base de datos.


$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");

$sql="UPDATE manprogramado SET  idMaqEquipo='$codInterno1', title='$title', body='$body', class='$tipo', start='$inicio', `end`='$final',  inicio_normal='$fro', final_normal='$to' where idMaqEquipo='$codInterno1'";
		
$cs=mysqli_query($conexion, $sql);

if ($cs==true) {
	echo "Registro Actualizado";
}else{

	echo "Registro No Actualizado";
}









?>