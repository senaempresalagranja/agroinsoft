<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Reporte Novedad.xls");

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
    <td><strong>CODIGO INTERNO MAQUINA</strong></td>
    <td><strong>NOMBRE</strong></td>
    <td><strong>TIPO NOVEDAD</strong></td>
    <td><strong>FECHA</strong></td>
    <td><strong>PERSONA QUE REPORTA</strong></td>
    <td><strong>DOCUMENTO</strong></td>
    <td><strong>ESPECIFICACIÓN</strong></td>
    <td><strong>PRIORIDAD</strong></td>
  </tr>
  
<?PHP


$id_maquina=$_POST["id_maquina"];
  $tipNovedad=$_POST["tipNovedad"];
  $fecNovedad=$_POST["fecNovedad"];
  $perNovedad=$_POST["perNovedad"];
  $cedPerNovedad=$_POST["cedPerNovedad"];
  $espNovedad=$_POST["espNovedad"]; 
  $prioridad=$_POST["prioridad"];   

$sql=mysqli_query($conexion, "SELECT nomElemento, codInterno, tipNovedad, fecNovedad, perNovedad, cedPerNovedad, espNovedad, prioridad FROM `novedades` INNER JOIN maqyequipo ON novedades.idMaqEquipo=maqyequipo.idMaqEquipo where novedades.idMaqEquipo=$id_maquina ");

          $fila=mysqli_fetch_array($sql);


				

?>  
 <tr>
	<td><?php echo $fila[1]; ?></td>
	<td><?php echo $fila[0] ?></td>
	<td><?php echo $tipNovedad; ?></td>
	<td><?php echo $fecNovedad; ?></td>
	<td><?php echo $perNovedad; ?></td>
	<td><?php echo $cedPerNovedad; ?></td>
	<td><?php echo $espNovedad; ?></td>
	<td><?php echo $prioridad; ?></td>                     
 </tr> 

</table>
</body>
</html>