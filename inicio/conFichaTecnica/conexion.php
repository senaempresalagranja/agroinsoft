
<?php
  

    $nomElemento=$_REQUEST['nomElemento'];
    $idResponsable=$_REQUEST['idResponsable'];
    $idUnidad=$_REQUEST['idUnidad'];    
    $fecAdquisicion=$_REQUEST['fecAdquisicion'];

    $numPlaca=$_REQUEST['numPlaca'];
    $codIntInventario=$_REQUEST['codIntInventario'];    
    $marEquipo=$_REQUEST['marEquipo'];
$canElemento=$_REQUEST['canElemento'];
    $modelo=$_REQUEST['modelo'];
    $capacidad=$_REQUEST['capacidad'];    
    $imagen=$_REQUEST['imagen'];


$servidor = "localhost"; //el nombre del servidor que utilizaremos en este caso utilizamos localhost
$usuario = "root"; // ususario que acabamos de crear en la base de datos
$contraseña = ""; //La contraseña del usuario que estamos utilizando
$BD = "bdagroinsoft"; //El nombre de la base de datos.


$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");
$insert1="INSERT INTO maquinasyeq ( nomElemento, idResponsable,  idUnidad, fecAdquisicion, numPlaca,  codIntInventario, marEquipo, canElemento,  modelo, capacidad,  imagen) VALUES ( '$nomElemento',  
  '$idResponsable', '$idUnidad', '$fecAdquisicion', '$numPlaca',  
  '$codIntInventario', '$marEquipo', '$canElemento',  
  '$modelo', '$capacidad', '$imagen' )";
$respuesta=mysqli_query($conexion,  $insert1)  or die ("problemas al insertar");
echo "Registro Insertado";

?>