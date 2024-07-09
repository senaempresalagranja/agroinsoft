<!DOCTYPE html>
<html lang="es">
<head>
	<title>Agroinsoft</title>
	<meta charset="utf-8">
<script src='query.js'></script>
</head>
<body >

			<h2>Formulario de Login</h2>
			<input type="text" placeholder="&#128272; Usuario" name="usuario1" id="usuario1" required="">
			<input placeholder="&#128272; contraseña" type="password" name="contraseña" id="contraseña" required="">
			<input type="button" onclick="login()"   value="Ingresar" name="">	
<div id="contene">

</div>
	
</body>

<script>
	
function login() {

var contraseña=document.getElementById('contraseña').value;
var usuario1=document.getElementById('usuario1').value;

$("#contene").load("validar_usuario.php",{contraseña:contraseña,usuario1:usuario1});




}


</script>
</html>