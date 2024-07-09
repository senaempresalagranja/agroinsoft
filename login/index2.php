<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Prueba Pop Up </title>

	<link rel="stylesheet" href="demo.css">
	<script src='query.js'></script>
</head>
<body>
	
	<h2>Pop Up Iniciar Sesion</h2>
	
	<input type="button" value="Iniciar Sesion" class="button" data-type="zoomin" />

	<div class="overlay-container">
		<div class="window-container zoomin">
		<table align="center" >
			<h2>Formulario de Login</h2>
			<tr> <td> <input type="text" placeholder="&#128272; Usuario" name="usuario1" id="usuario1"><br/><br/></td></tr> 
			<tr> <td><input placeholder="&#128272; contraseña" type="password" name="contraseña" id="contraseña"><br/><br/></td></tr> 
			<tr> <td><input type="button" onclick="login()" align="center"   value="Ingresar" name="">	<br/><br/></td></tr> </table>
<div id="contene">

</div>
			<span class="close">Cerrar</span>
		</div>

	 <script>
	
function login() {

var contraseña=document.getElementById('contraseña').value;
var usuario1=document.getElementById('usuario1').value;

$("#contene").load("validar_usuario.php",{contraseña:contraseña,usuario1:usuario1});




}


</script>
	
	<script>!window.jQuery && document.write(unescape('%3Cscript src="jquery-1.7.1.min.js"%3E%3C/script%3E'))</script>
	<script type="text/javascript" src="demo.js"></script>
	

</body>

</html>