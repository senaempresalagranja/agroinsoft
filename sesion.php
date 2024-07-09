<?php 

session_start();
$_SESSION['usuario']=$_REQUEST['usuario1'];
$_SESSION['contraseña']=$_REQUEST['contraseña1'];
$_SESSION['instante']   = time(10000000);

header("Location:inicio/datos/inicio.php");

 ?>