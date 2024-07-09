<?php 


$codInterno=$_POST["codInterno"];

$servidor = "localhost"; 
$usuario = "root"; 
$contraseña = ""; 
$BD = "bdagroinsoft"; 


$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");
$query="SELECT codInterno, nomElemento FROM maqyequipo WHERE codInterno='$codInterno'";
$RESOURCE=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($RESOURCE);

echo "
<script>
var nombre_maquina=document.getElementById('nombre_maquina').value='$fila[1]';

</script>
";


 ?>