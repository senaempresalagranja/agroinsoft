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


// 		$sql="SELECT * FROM fictecnica WHERE idMaqEquipo='$codInterno' ";
// 		$cs=mysqli_query($conexion, $sql);
// 		$resource=mysqli_fetch_row($cs);


// 	echo "<script>

// var funUsos=document.getElementById('funUsos').value='$resource[2]';
// var desFisica=document.getElementById('desFisica').value='$resource[3]';
// var espTecnica=document.getElementById('espTecnica').value='$resource[4]';
// var conSeguridad=document.getElementById('conSeguridad').value='$resource[5]';
// var alistamiento=document.getElementById('alistamiento').value='$resource[6]';
// var verCalibracion=document.getElementById('verCalibracion').value='$resource[7]';
// var instrucciones=document.getElementById('instrucciones').value='$resource[8]';
// var condiciones=document.getElementById('condiciones').value='$resource[9]';
// var mantenimiento=document.getElementById('mantenimiento').value='$resource[10]';
// var limDesinfeccion=document.getElementById('limDesinfeccion').value='$resource[11]';
// var conManejo=document.getElementById('conManejo').value='$resource[12]';



// 	</script>";




 ?>