<?php 



$contraseña=$_POST["contraseña"];
$usuario1=$_POST["usuario"];


     	$servidor = "localhost"; 
		$usuarios = "root"; 
		$contrasenna = ""; 
		$BD = "bdagroinsoft"; 
		$conexion = mysqli_connect($servidor, $usuarios, $contrasenna, $BD);
		$query="SELECT * FROM usuario WHERE nomUsuario='$usuario1' ";

		$resource=mysqli_query($conexion, $query);
		$fila=mysqli_fetch_row($resource);
// AQUI ABAJO ES PARA DESENCRIPTAR LA CONTRASEÑA
$salt='AZC·$%9742#¬~€~¬~#bsg35679#~€¬$)%1243';
$resource1=password_verify($salt . $contraseña, $fila[2]);

	if ($resource1==true) {
		echo "<script>


	$('#formualrio').submit();

		</script>";
	}else{
		echo "login no correcto";
		// $salt='AZC·$%9742#¬~€~¬~#bsg35679#~€¬$)%1243';
// $contraseña=password_hash($salt .$contraseña, PASSWORD_DEFAULT,["cost"=> 12]);
// echo "$contraseña";
	}




?>