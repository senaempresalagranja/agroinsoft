<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Reporte Entrada.xls");

		$conexion=mysqli_connect("localhost","root","", "bdagroinsoft");



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista de Novedades</title>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="7" bgcolor="#F5FFFA"><CENTER><strong>AGROINSOFT 2.0</strong></CENTER>
    <CENTER><strong>Sistema de Información para el Control de Mantenimientos Correctivos y Preventivos</strong></CENTER>

    </td>
    <td >
    	<img src="logo.png"/>
    </td>
  </tr>
  <tr>
    <td colspan="8"  bgcolor="#99CCFF"><CENTER><strong>LISTADO DE NOVEDADES</strong></CENTER></td>
  </tr>
  <tr  bgcolor="silver">
    <td><strong>CODIGO INTERNO</strong></td>
    <td><strong>NOMBRE</strong></td>
    <td><strong>FECHA</strong></td>
    <td><strong>ESTADO DE ENTRADA</strong></td>
    <td><strong>UBICACION</strong></td>
    <td><strong>PROCEDIMIENTO</strong></td>
    <td><strong>QUIEN RECIBE</strong></td>
    <td><strong>DOCUMENTO</strong></td>
  </tr>
  
<?PHP


  $id_maquina=$_POST["id_maquina"];
  $fecEntrada=$_POST["fecEntrada"];
  $estMaqEntrada=$_POST["estMaqEntrada"];
  $idUbicacion=$_POST["idUbicacion"];
  $procedimiento=$_POST["procedimiento"];
  $nomPer=$_POST["nomPer"];
  $cedPer=$_POST["cedPer"];  

$sql=mysqli_query($conexion, "SELECT nomElemento, codInterno, fecEntrada, estMaqEntrada, nomUbicacion, procedimiento, nomPer, cedPer FROM `entradas` INNER JOIN maqyequipo ON entradas.idMaqEquipo=maqyequipo.idMaqEquipo INNER JOIN ubicacion ON entradas.idUbicacion=ubicacion.idUbicacion where entradas.idMaqEquipo=$id_maquina ");

          $fila=mysqli_fetch_array($sql);


				

?>  
 <tr>
  <td><?php echo $fila[1]; ?></td>
  <td><?php echo $fila[0]; ?></td> 
  <td><?php echo $fecEntrada; ?></td>
  <td><?php echo $estMaqEntrada; ?></td>
  <td><?php echo $fila[4]; ?></td>
  <td><?php echo $procedimiento; ?></td>
  <td><?php echo $nomPer; ?></td>
  <td><?php echo $cedPer; ?></td>                    
 </tr> 

</table>
</body>
</html>