<?php 

$buscar=$_POST["buscar"];

//CONEXION A LA BD

$servidor = "localhost"; //el nombre del servidor que utilizaremos en este caso utilizamos localhost
$usuario = "root"; // ususario que acabamos de crear en la base de datos
$contraseña = ""; //La contraseña del usuario que estamos utilizando
$BD = "bdagroinsoft"; //El nombre de la base de datos.


$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");
$query="SELECT * FROM maqyequipo WHERE codInterno='$buscar'";
$RESOURCE=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($RESOURCE);


echo "<script>

var nomElemento=document.getElementById('nomElemento').value='$fila[1]';
var codInventario=document.getElementById('codInventario').value='$fila[2]';
var codInterno=document.getElementById('codInterno').value='$fila[3]';
var marElemento=document.getElementById('marElemento').value='$fila[4]';
var seriale=document.getElementById('seriale').value='$fila[5]';
var modelo=document.getElementById('modelo').value='$fila[6]';
var capacidad=document.getElementById('capacidad').value='$fila[7]';
var fecAdquisicion=document.getElementById('fecAdquisicion').value='$fila[8]';
var idUbicacion=document.getElementById('idUbicacion').value='$fila[9]';
var estElemento=document.getElementById('estElemento').value='$fila[10]';
var idCuentadante=document.getElementById('idCuentadante').value='$fila[11]';
var numFicTecnica=document.getElementById('numFicTecnica').value='$fila[12]';
var idClasificacion=document.getElementById('idClasificacion').value='$fila[13]';
var img=document.getElementById('img').src='imagenes/$fila[14]';

</script>"
	

 ?>