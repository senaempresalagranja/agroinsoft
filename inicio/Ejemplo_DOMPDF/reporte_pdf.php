<?php

		require_once("dompdf/dompdf_config.inc.php");
		$conexion=mysql_connect("localhost","root","");
		mysql_select_db("test",$conexion);


$codigoHTML='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
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
  </tr>';
  


$sql=mysql_query("select * from alumnos");
while($res=mysql_fetch_array($sql)){
$codigoHTML.='	
	<tr>
		<td>'.$res['id'].'</td>
		<td>'.$res['Nombre'].'</td>
		<td>'.$res['Apellido'].'</td>
		<td>'.$res['Sexo'].'</td>
		<td>'.$res['FechaNacimiento'].'</td>
		<td>'.$res['FechaRegistro'].'</td>										
	</tr>';
	
}
$codigoHTML.='
</table>
</body>
</html>';
$codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Reporte_tabla_usuarios.pdf");
?>