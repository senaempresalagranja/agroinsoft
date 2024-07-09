 <?php

     $nomElemento=$_REQUEST["nomElemento"];
     $codInventario=$_REQUEST['codInventario'];
     $codInterno=$_REQUEST['codInterno'];
     $marElemento=$_REQUEST['marElemento'];
     $seriale=$_REQUEST['seriale'];
     $modelo=$_REQUEST['modelo'];
     $capacidad=$_REQUEST['capacidad'];
     $fecAdquisicion=$_REQUEST['fecAdquisicion'];
     $idUbicacion=$_REQUEST['idUbicacion'];
     $estElemento=$_REQUEST['estElemento'];
     $idCuentadante=$_REQUEST['idCuentadante'];
     $numFicTecnica=$_REQUEST['numFicTecnica'];
     $idClasificacion=$_REQUEST['idClasificacion'];
//Recibimos los datos de la imagen

  $imagen=$_FILES['imagen']['name'];
  $tipo_imagen=$_FILES['imagen']['type'];
  $tamaño_imagen=$_FILES['imagen']['size'];

//echo "$idResponsable";
// echo "<p></p>";
      

if ($tamaño_imagen<=1000000) {
  
  if ($tipo_imagen=="image/jpeg" || $tipo_imagen=="image/jpg" || $tipo_imagen=="image/png" || $tipo_imagen=="image/gif") {
    
  //Ruta de la carpeta destino en servidor
$carpeta_destino=$_SERVER['DOCUMENT_ROOT'] .'/agroinsoft/inicio/form_maquina/imagenes/';

//Movemos la imagen del directorio temporal al directorio escogido
move_uploaded_file($_FILES ['imagen']['tmp_name'], $carpeta_destino.$imagen);

echo "<p>Imagen Guardada</p>";  

    //Cierra segundo if
    }else{
      echo "Solo se pueden subir imagenes correspondientes al tipo permitido <br/><br/><br/>";
    }

//Cierra primer if
}else{


  echo "Imagen excede limite de tamaño";

  
}


//CONEXION A LA BD

$servidor = "localhost"; //el nombre del servidor que utilizaremos en este caso utilizamos localhost
$usuario = "root"; // ususario que acabamos de crear en la base de datos
$contraseña = ""; //La contraseña del usuario que estamos utilizando
$BD = "bdagroinsoft"; //El nombre de la base de datos.


$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");

$insert1="INSERT INTO maqyequipo ( `nomElemento`, `codInventario`, `codInterno`, `marElemento`, `seriale`, `modelo`, `capacidad`, `fecAdquisicion`, `idUbicacion`, `estElemento`, `idCuentadante`, `numFicTecnica`, `idClasificacion`, `imagen`) VALUES ('$nomElemento', '$codInventario', '$codInterno', '$marElemento', '$seriale', '$modelo', '$capacidad', '$fecAdquisicion', '$idUbicacion', '$estElemento', '$idCuentadante', '$numFicTecnica', '$idClasificacion', '$imagen')";
$respuesta=mysqli_query($conexion,  $insert1)  or die ("problemas al insertar");
if($respuesta==true){
  echo "<script>

  alert('Registro Exitoso')</script>";
  header("Location:maqyequipo.php");

}


  ?>
