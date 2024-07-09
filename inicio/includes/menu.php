
<div id="menu">
        <li><a href="../datos/inicio.php"><span class="icon-house"></span>Inicio</a></li>

<div id="registrar" >
        <li class="submenu">
          <a href="#">
          <span class="icon-rocket"></span>Registrar
          <img class="abajo" src="../../abajo.svg"></a>
          <ul class="children">
            <li><a href="../form_maquina/maqyequipo.php">Maquinaria o Equipo<span class="icon-dot"></span></a></li>
            <li><a href="../form_Ficha_Tecnica/FichaTecnica.php">Ficha Tecnica<span class="icon-dot"></span></a></li>
            <li><a href="../form_novedad/novedad.php">Novedades<span class="icon-dot"></span></a></li>
            <li><a href="../form_manEjecutado/manEjecutado.php">Mantenimientos Ejecutados<span class="icon-dot"></span></a></li>
            <li><a href="../form_entradas/entrada.php">Entradas<span class="icon-dot"></span></a></li>
            <li><a href="../form_salida/salida.php">Salidas<span class="icon-dot"></span></a></li>
            <li><a href="../form_Cuentadante/cuentadante.php">Cuentadante<span class="icon-dot"></span></a></li>
            <li><a href="../form_Proveedor/proveedor.php">Proveedor<span class="icon-dot"></span></a></li>
            <li><a href="../form_solicitud/solicitud.php">Solicitud<span class="icon-dot"></span></a></li>
          </ul>
        </li>

     
        <li class="submenu">
          <a href="#">
          <span class="icon-rocket"></span>Programar
          <img class="abajo" src="../../abajo.svg"></a>
          <ul class="children">
<!--            <li><a href="../programar/programarMantenimiento.php">Programar From<span class="icon-dot"></span></a></li> -->
            <li><a href="../form_Programar/index.php">Abrir Calendario <span class="icon-dot"></span></a></li>
           
          </ul>
        </li>

        <li class="submenu">
          <a href="#">
          <span class="icon-rocket"></span>Consultas
          <img class="abajo" src="../../abajo.svg"></a>
          <ul class="children">
          <li><a href="../conVisor/index.php">Visor de Mantenimientos<span class="icon-dot"></span></a></li>
           <li><a href="../conMaquina/conMaquina.php">Maquinaria o Equipo<span class="icon-dot"></span></a></li>
            <li><a href="../conNovedad/conNovedad.php">Novedades<span class="icon-dot"></span></a></li>
            <li><a href="../conEntradas/conEntradas.php">Entradas<span class="icon-dot"></span></a></li>
            <li><a href="../conSalidas/conSalidas.php">Salidas<span class="icon-dot"></span></a></li>
            <li><a href="../conManEjecutado/conManEjecutado.php">Mantenimientos Ejecutados<span class="icon-dot"></span></a></li>
            <li><a href="../conManProgramado/conProgramado.php">Mantenimientos Programados<span class="icon-dot"></span></a></li>
            <li><a href="../conSolicitud/conSolicitud.php">Solicitudes<span class="icon-dot"></span></a></li>
          </ul>
        </li>

       <li class="submenu">
          <a href="#">
          <span class="icon-rocket"></span>Ayuda
          <img class="abajo" src="../../abajo.svg"></a>
          <ul class="children">
           <li><a href="../Ayuda/ayuda.php">Ayuda en Linea<span class="icon-dot"></span></a></li>
            <li><a href="../Ayuda/manual.pdf"">Manual de Usuario<span class="icon-dot"></span></a></li>
          </ul>
        </li>

        <li class="submenu">
          <a href="#">
          <span class="icon-rocket"></span>Configuración
          <img class="abajo" src="../../abajo.svg"></a>
          <ul class="children">
           <li><a href="../form_usuario/usuario.php">Cambiar Contraseñas<span class="icon-dot"></span></a></li>
            <li><a href="../copia_seguridad/index.php">Copia de Seguridad<span class="icon-dot"></span></a></li>
          </ul>
        </li>
        

        <li  class="cerrar" ><a class="cerrar"  href="../../login/cerrar_sesion.php">Cerrar sesion</a></li>

      </ul>
      	</div>
      <div>
      
    </nav>
  </header>
  
 
<script>
	if (consulta==1){
		$('#registrar').addClass('consultas')
		
	}else{
		$('#registrar').display="block";
	}

</script>
	