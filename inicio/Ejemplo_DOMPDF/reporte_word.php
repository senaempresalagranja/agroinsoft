<?php

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=Reporte_Personal_usuarios.doc");


		$conexion=mysql_connect("localhost","root","");
		mysql_select_db("test",$conexion);		


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LISTA DE USUARIOS</title>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="6" bgcolor="skyblue"><CENTER><strong>REPORTE DE LA TABLA USUARIOS</strong></CENTER></td>
  </tr>
 <tr bgcolor="silver">
    <td><strong>CODIGO</strong></td>
    <td><strong>NOMBRE</strong></td>
    <td><strong>APELLIDO</strong></td>
    <td><strong>SEXO</strong></td>
    <td><strong>FECHA NACIMIENTO</strong></td>
    <td><strong>FECHA REGISTRO</strong></td>
  </tr>
  
<?PHP
		
$sql=mysql_query("select * from alumnos");
while($res=mysql_fetch_array($sql)){		

	$codigo=$res["id"];
	$nombre=$res["Nombre"];
	$Apellido=$res["Apellido"];
	$Pais=$res["Sexo"];
	$edad=$res["FechaNacimiento"];
	$dni=$res["FechaRegistro"];					
					

?>  
 <tr>
	<td><?php echo $codigo; ?></td>
	<td><?php echo $nombre; ?></td>
	<td><?php echo $Apellido; ?></td>
	<td><?php echo $Pais; ?></td>
	<td><?php echo $edad; ?></td>
	<td><?php echo $dni; ?></td>                     
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>