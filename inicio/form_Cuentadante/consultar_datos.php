<?php 

$numDocumento=$_POST["numDocumento"];


$servidor = "localhost"; 
$usuario = "root"; 
$contraseña = ""; 
$BD = "bdagroinsoft"; 


		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");
		$sql="SELECT * FROM cuentadante WHERE numDocumento='$numDocumento' ";
		$cs=mysqli_query($conexion, $sql);
		$resource=mysqli_fetch_row($cs);


	echo "<script>


var tipDocumento=document.getElementById('tipDocumento').value='$resource[1]';
var numDocumento=document.getElementById('numDocumento').value='$resource[2]';
var nomCuentadante=document.getElementById('nomCuentadante').value='$resource[3]';
var apeCuentadante=document.getElementById('apeCuentadante').value='$resource[4]';
var fecNacimiento=document.getElementById('fecNacimiento').value='$resource[5]';
var idCargo=document.getElementById('idCargo').value='$resource[6]';
var telCuentadante=document.getElementById('telCuentadante').value='$resource[7]';
var emaCuentadante=document.getElementById('emaCuentadante').value='$resource[8]';
var dirCuentadante=document.getElementById('dirCuentadante').value='$resource[9]';



	</script>";

 ?> 