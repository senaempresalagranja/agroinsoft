<?php

session_start();
$usuario=$_SESSION['usuario'];
$contraseña=$_SESSION['contraseña'];

if (isset($usuario) && isset($contraseña)) {

	$connection=mysqli_connect("localhost","root","","bdagroinsoft");
							$query="SELECT * FROM usuario WHERE nomUsuario='$usuario'";
							$resource=mysqli_query($connection,$query);

							$fila=mysqli_fetch_row($resource);

echo "<script>
var usuario='$fila[1]';


</script>";


}else{

header("Location:../../index.php");	


}


						


					

 ?>
