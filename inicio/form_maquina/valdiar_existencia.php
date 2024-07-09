<?php 

$servidor = "localhost"; //el nombre del servidor que utilizaremos en este caso utilizamos localhost
$usuario = "root"; // ususario que acabamos de crear en la base de datos
$contraseña = ""; //La contraseña del usuario que estamos utilizando
$BD = "bdagroinsoft"; //El nombre de la base de datos.

$codInterno=$_POST["codInterno"];
$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");
$query="SELECT * FROM `maqyequipo` WHERE `codInterno`='$codInterno'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==true) {
  echo "<script>

alert('maquina ya existe ')

  </script>";
}else{


echo "<script>


$('#formulario').submit();

</script>";

} ?>