<?php 

$local="localhost";
$usuario="root";
$contra="";
$base="bdagroinsoft";
$Nombre_proveedores=$_POST["Nombre_proveedores"];
$NIT=$_POST["NIT"];

echo "<table>

<tr>
<td>Nombre Proveedor</td>
<td>NIT</td>
<td>Telefono</td>

<td>Dirreccion</td>
<td>Correo</td>
<td>Sitio web</td>
</tr>

";


$conexion=mysqli_connect($local,$usuario,$contra,$base);
$query="SELECT * FROM `proveedor` WHERE `nomProveedor` LIKE '%$Nombre_proveedores%' OR `nitProveedor` LIKE '%$NIT%'";
$resource=mysqli_query($conexion,$query);
$filas=mysqli_num_rows($resource);
if ($filas>0) {
	while($fila=mysqli_fetch_row($resource)){
echo "<tr>

<td>$fila[1]</td>
<td>$fila[2]</td>
<td>$fila[3]</td>
<td>$fila[4]</td>
<td>$fila[5]</td>
<td>$fila[6]</td>



</tr>";

}


}else{


	echo "no existe proveedor $Nombre_proveedores";
}
echo "</table>";


 ?>