<!DOCTYPE html>
<html lang="es">
<head>

	<title>Agroinsoft 2.0</title>
	<!--[if lt IE 9]>
<script src=”http://HTML5shim.googlecode.com/svn/trunk/HTML5.js”>
</script>
<![endif]-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="estilosCabecera.css">
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<link rel="stylesheet" href="login/demo.css">
	<script src='login/query.js'></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="main.js"></script>

</head>

<body >
	<header>

		<div class="menu_bar">
			<a href="#" class="bt-menu"><span class="icon-list2"></span>AGROINSOFT 2.0</a>
		</div>
 
		<nav>
			<ul>
				<li id="logo"><a href="#">AGROINSOFT 2.0</a></li>
				<li><a href="#"><span class="icon-house"></span>Inicio</a></li>

				<li class="submenu">
					<a href="#">
					<span class="icon-rocket"></span>Consultar
					<img class="abajo" src="abajo.svg"></a>
					<ul class="children">
				
					<form action="inicio/conInicio/conMaquina.php" method="post" id="consultar_maquina">
						<input type="hidden" name="consultar" value="Consulta">
						<li><a href="#"  onClick="enviar_consultas()">Maquinaria y Equipos <span class="icon-dot"></span></a></li>
						</form>
						<script>
						function enviar_consultas(){
						$("#consultar_maquina").submit();
						}
						</script>
						
					</ul>
				</li>
				<li><a href="quienesSomos.php"><span class="icon-earth"></span>Quienes Somos</a></li>
				<li><a href="resena.php"><span class="icon-mail"></span>Reseña Historica</a></li>
				<li><a href="http://proyectoadsistricks.blogspot.com.co/" target="blank" ><span class="icon-mail"></span>Blog</a></li>
				<li><a href="acercade.php"><span class="icon-earth"></span>Acerca de</a></li>
				<li class="nombre sesion stc button"  type="button" data-type="zoomin"><a  href="#"><span class="icon-earth"></span>Iniciar Sesion</a></li>

				
			</ul>
		</nav>

	</header>


	<section class="contenido">
		
	
	<section class="conteiner-top">
		<img class="item-top" src="img/isologo.png"></img>
		
	</section>

		<div class="center-top">
			<p class="text-top">Sistema de Informacion Para el Control de Mantenimientos de Maquinaria y Equipos Del Area Agroindustrial</p>
			<span class="descripcion-top">Centro Agropecuario "LA GRANJA"</span>
		</div>
	<section class="con-titulo" >

		
			Bienvenido  ! 
	
		
	</section>

	<section class="principal" >
		
		<div class="text">
			<img class="text-img" src="img/images.png" alt="">
			<span class="text-des">
				Mejora la eficiencia en el trabajo y en la efectividad de la producción.

			</span>
		</div>
		<div class="text">
			<img class="text-img" src="img/descarga(1).png" alt="">
			<span class="text-des">
				 Con la aplicación del mantenimiento adecuado y periódico se optimiza el rendimiento de los equipos, se disminuye el proceso de obsolencia y se prolonga la vida útil de los equipos, provocando de este modo la reducción en los costos de operación y reparación.

			</span>
		</div>
		<div class="text">
			<img class="text-img" src="img/descarga.png" alt="">
			<span class="text-des">
				Contribuimos a la disminución de material impreso y por ende el uso de papel.
			</span>
		</div>


	</section>

	

	
	</section>
<footer>
			
			<span>&#169; Agroinsoft - 2017</span>
		<span id="conte">
			<a  href="delovrs/index.php">Desarrolladores</a>
		</span>
				
			
	</footer>
	


</body>

	<div class="overlay-container">
			<form class="" action="sesion.php" method="post" id="formualrio">
		<div class="window-container zoomin">
		<div class="title-poad">Iniciar Sesion</div>
			<div class="body-poad">
		<input class="txt" type="text" placeholder="&#128272; Usuario" name="usuario1" id="usuario1">

			<input class="txt" placeholder="&#128272; contraseña" type="password" name="contraseña1" id="contraseña1">
<div id="contene">
			
			</div>

		<div class="botones-poad">
			<input class="bnt-poad sesion" type="button" onclick="login()"    value="Ingresar" name="">	
		
			<input class=" bnt-poad close" type="button"  align="center"   name="" value="cerrar">
			</div>
			</div>	
			</form>
			
		</div>
			
	 <script>
	

    function login() {
      var usuario=document.getElementById('usuario1').value;
      var contraseña=document.getElementById('contraseña1').value;
      $("#contene").load("login/validar_usuario.php",{usuario:usuario, contraseña:contraseña})


    }


</script>
	
	<script>!window.jQuery && document.write(unescape('%3Cscript src="login/jquery-1.7.1.min.js"%3E%3C/script%3E'))</script>
	<script type="text/javascript" src="login/demo.js"></script>
</html>