<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Reporte Maquina.xls");

		$conexion=mysqli_connect("localhost","root","", "bdagroinsoft");



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista de Maquinas</title>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="13" bgcolor="#F5FFFA"><CENTER><strong>AGROINSOFT 2.0</strong></CENTER>
    <CENTER><strong>Sistema de Información para el Control de Mantenimientos Correctivos y Preventivos</strong></CENTER>

    </td>
    <td >
    	<img src="logo.png"/>
    </td>
  </tr>
  <tr>
    <td colspan="14"  bgcolor="#99CCFF"><CENTER><strong>LISTADO DE MAQUINAS</strong></CENTER></td>
  </tr>
  <tr  bgcolor="silver">
    <td><strong>NOMBRE MAQUINA</strong></td>
    <td><strong>CODIGO INVENTARIO</strong></td>
    <td><strong>CODIGO INTERNO </strong></td>
    <td><strong>MARCA</strong></td>
    <td><strong>SERIAL</strong></td>
    <td><strong>MODELO</strong></td>
    <td><strong>CAPACIDAD</strong></td>
    <td><strong>FECHA ADQUISICION</strong></td>
    <td><strong>UBICACION</strong></td>
    <td><strong>ESTADO</strong></td>
    <td><strong>CUENTADANTE</strong></td>
    <td><strong>N. FICHA TECNICA</strong></td>
    <td><strong>CLASIFICACION</strong></td>
    <td><strong>IMAGEN</strong></td>
  </tr>
  
<?PHP


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
      

        $connection=mysqli_connect("localhost","root","","bdagroinsoft");

              $query1="SELECT * FROM maqyequipo WHERE codInterno='$codInterno'";
              $resource1=mysqli_query($connection,$query1);
              $fila1=mysqli_fetch_row($resource1);

              $query="SELECT nomUbicacion FROM `ubicacion` WHERE idUbicacion='$idUbicacion'";
              $resource=mysqli_query($connection,$query);
              $fila=mysqli_fetch_row($resource);

              $query2="SELECT nomClasificacion FROM `clasificacion` WHERE idClasificacion='$idClasificacion'";
              $resource2=mysqli_query($connection,$query2);
              $fila2=mysqli_fetch_row($resource2);

  
              $query3="SELECT  idCuentadante, CONCAT( nomCuentadante, ' ', apeCuentadante) AS infCuentadante FROM cuentadante WHERE idCuentadante='$idCuentadante' ";
              $resource3=mysqli_query($connection,$query3);
              $fila3=mysqli_fetch_row($resource3);  


				

?>  
 <tr>
  <td><?php echo $nomElemento; ?></td>
  <td><?php echo $codInventario; ?></td>
  <td><?php echo $codInterno; ?></td>
  <td><?php echo $marElemento; ?></td>
  <td><?php echo $seriale; ?></td>
  <td><?php echo $modelo; ?></td>
  <td><?php echo $capacidad; ?></td> 
  <td><?php echo $fecAdquisicion; ?></td>
  <td><?php echo $fila[0]; ?></td>
  <td><?php echo $estElemento; ?></td>
  <td><?php echo $fila3[1]; ?></td>
  <td><?php echo $numFicTecnica; ?></td>
  <td><?php echo $fila2[0]; ?></td> 
  <td><img src="../imagenes/11.png" alt="" /></td>                     
 </tr> 

</table>
</body>
</html>