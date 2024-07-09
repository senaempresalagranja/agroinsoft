<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Reporte_Personal_usuarios.xls");


		$conexion=mysql_connect("localhost","root","");
		mysql_select_db("bdagroinsoft", $conexion );		


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
    <td colspan="6" bgcolor="skyblue"><CENTER><strong>REPORTE DE NOVEDADES</strong></CENTER></td>
  </tr>
  <tr bgcolor="silver">
    <td><strong>CODIGO INTERNO MAQUINA</strong></td>
    <td><strong>TIPO NOVEDAD</strong></td>
    <td><strong>FECHA</strong></td>
    <td><strong>PERSONA QUE REPORTA</strong></td>
    <td><strong>DOCUMENTO</strong></td>
    <td><strong>ESPECIFICACIÓN</strong></td>
    <td><strong>PRIORIDAD</strong></td>
  </tr>
  
<?PHP
		
$sql=mysql_query("select * from novedades");
while($res=mysql_fetch_array($sql)){		

	$codigo=$res["idMaqEquipo"];
	$tipNovedad=$res["tipNovedad"];
	$fecNovedad=$res["fecNovedad"];
	$perNovedad=$res["perNovedad"];
	$cedPerNovedad=$res["cedPerNovedad"];
	$espNovedad=$res["espNovedad"];	
	$prioridad=$res["prioridad"];					

?>  
 <tr>
	<td><?php echo $codigo; ?></td>
	<td><?php echo $tipNovedad; ?></td>
	<td><?php echo $fecNovedad; ?></td>
	<td><?php echo $perNovedad; ?></td>
	<td><?php echo $cedPerNovedad; ?></td>
	<td><?php echo $espNovedad; ?></td>
	<td><?php echo $prioridad; ?></td>                     
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>