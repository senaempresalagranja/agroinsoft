<?php

include '../../login/inicio_sesion.php';




// Definimos nuestra zona horaria
date_default_timezone_set("America/Bogota");

// incluimos el archivo de funciones
include 'funciones.php';

// incluimos el archivo de configuracion
include 'config.php';

// Verificamos si se ha enviado el campo con name from
if (isset($_POST['from'])) 
{

    // Si se ha enviado verificamos que no vengan vacios
    if ($_POST['from']!="" AND $_POST['to']!="") 
    {

        $codInterno = $_POST['codInterno1'];

        // Recibimos el fecha de inicio y la fecha final desde el form

        $inicio = _formatear($_POST['from']);
        // y la formateamos con la funcion _formatear

        $final  = _formatear($_POST['to']);

        // Recibimos el fecha de inicio y la fecha final desde el form

        $inicio_normal = $_POST['from'];

        // y la formateamos con la funcion _formatear
        $final_normal  = $_POST['to'];

        // Recibimos los demas datos desde el form
        $titulo = evaluar($_POST['title']);

        // y con la funcion evaluar
        $body   = evaluar($_POST['event']);

        // reemplazamos los caracteres no permitidos
        $clase  = evaluar($_POST['class']);

           // $servidor = "localhost"; 
           //              $usuario = "root"; 
           //              $contraseña = ""; 
           //              $BD = "eventos"; 
           //              $conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
           //              $insertar="SELECT * FROM `maqyequipo` where codInterno=$codInterno ";
           //                  $resource=mysqli_query($conexion, $insertar);
           //                  $fila=mysqli_fetch_row($resource);


        // insertamos el evento
        $query="INSERT INTO manprogramado VALUES(null,$codInterno,'$titulo','$body','','$clase','$inicio','$final','$inicio_normal','$final_normal')";

        // Ejecutamos nuestra sentencia sql
        $conexion->query($query); 

        // Obtenemos el ultimo id insetado
        $im=$conexion->query("SELECT MAX(id) AS id FROM manprogramado");
        $row = $im->fetch_row();  
        $id = trim($row[0]);

        // para generar el link del evento
        $link = "$base_url"."descripcion_evento.php?id=$id";

        // y actualizamos su link
        $query="UPDATE manprogramado SET url = '$link' WHERE id = $id";

        // Ejecutamos nuestra sentencia sql
        $conexion->query($query); 

        // redireccionamos a nuestro calendario
        header("Location:$base_url"); 
    }
}

 ?>

<!DOCTYPE html>
<html lang="es">

<style type="text/css">
    #codInterno1{
    
        opacity:  0;
    }
</style>

<head>
        <meta charset="utf-8" >
        <title>Calendario</title>
        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=$base_url?>css/calendar.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <script type="text/javascript" src="<?=$base_url?>js/es-ES.js"></script>
        <script src="<?=$base_url?>js/jquery.min.js"></script>
        <script src="<?=$base_url?>js/moment.js"></script>
        <script src="<?=$base_url?>js/bootstrap.min.js"></script>
        <script src="<?=$base_url?>js/bootstrap-datetimepicker.js"></script>
        <link rel="stylesheet" href="<?=$base_url?>css/bootstrap-datetimepicker.min.css" />
       <script src="<?=$base_url?>js/bootstrap-datetimepicker.es.js"></script>
   

   
   

</head>

<style type="text/css">

   .abajo{ 
    width: 355px;
    height: 95px;

   }

   .cont{

        width: 994px;
    height: 95px;
}
       

   </style>
   


<nav  role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
   
    <img class="abajo" src="isoo.png">
  </div>

    <ul>
       <li><a href="../datos/inicio.php"><img class="cont" src="cont.png" ></a></li>
    </ul>

</nav>

<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
    <div class="navbar-header">
   
    <img class="" src="pie.png">
    </div>
</nav>



<body style="background: white;">

        <div class="container">

                <div class="row">
                        <div class="page-header"><h2></h2></div>
                                <div class="pull-left form-inline"><br>
                                        <div class="btn-group">
                                            <button class="btn btn-primary" data-calendar-nav="prev"><< Anterior</button>
                                            <button class="btn" data-calendar-nav="today">Actual</button>
                                            <button class="btn btn-primary" data-calendar-nav="next">Siguiente >></button>
                                        </div>
                                        <div class="btn-group">
                                            <button class="btn btn-warning" data-calendar-view="year">Año</button>
                                            <button class="btn btn-warning active" data-calendar-view="month">Mes</button>
                                            <button class="btn btn-warning" data-calendar-view="week">Semana</button>
                                            <button class="btn btn-warning" data-calendar-view="day">Dia</button>
                                        </div>

                                </div>
                                    <div class="pull-right form-inline"><br>
                                        <button class="btn btn-info" data-toggle='modal' data-target='#add_evento'>Programar Mantenimiento</button>
                                    </div>

                </div><hr>

                <div class="row">
                        <div id="calendar"></div> <!-- Aqui se mostrara nuestro calendario -->
                        <br><br>
                </div>

                <!--ventana modal para el calendario-->
                <div class="modal fade" id="events-modal">
                    <div class="modal-dialog">
                            <div class="modal-content">
                                    <div class="modal-body" style="height: 400px">
                                        <p>One fine body&hellip;</p>
                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
        </div>

    <script src="<?=$base_url?>js/underscore-min.js"></script>
    <script src="<?=$base_url?>js/calendar.js"></script>
    <script type="text/javascript">
        (function($){
                //creamos la fecha actual
                var date = new Date();
                var yyyy = date.getFullYear().toString();
                var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
                var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();



                //establecemos los valores del calendario
                var options = {

                    // definimos que los eventos se mostraran en ventana modal
                        modal: '#events-modal', 

                        // dentro de un iframe
                        modal_type:'iframe',    

                        //obtenemos los eventos de la base de datos
                        events_source: '<?=$base_url?>obtener_eventos.php', 

                        // mostramos el calendario en el mes
                        view: 'month',             

                        // y dia actual
                        day: yyyy+"-"+mm+"-"+dd,   


                        // definimos el idioma por defecto
                        language: 'es-ES', 

                        //Template de nuestro calendario
                        tmpl_path: '<?=$base_url?>tmpls/', 
                        tmpl_cache: false,


                        // Hora de inicio
                        time_start: '07:00', 

                        // y Hora final de cada dia
                        time_end: '22:00',   

                        // intervalo de tiempo entre las hora, en este caso son 30 minutos
                        time_split: '30',    

                        // Definimos un ancho del 100% a nuestro calendario
                        width: '100%', 

                        onAfterEventsLoad: function(events)
                        {
                                if(!events)
                                {
                                        return;
                                }
                                var list = $('#eventlist');
                                list.html('');

                                $.each(events, function(key, val)
                                {
                                        $(document.createElement('li'))
                                                .html('<a href="' + val.url + '">' + val.title + '</a>')
                                                .appendTo(list);
                                });
                        },
                        onAfterViewLoad: function(view)
                        {
                                $('.page-header h2').text(this.getTitle());
                                $('.btn-group button').removeClass('active');
                                $('button[data-calendar-view="' + view + '"]').addClass('active');
                        },
                        classes: {
                                months: {
                                        general: 'label'
                                }
                        }
                };


                // id del div donde se mostrara el calendario
                var calendar = $('#calendar').calendar(options); 

                $('.btn-group button[data-calendar-nav]').each(function()
                {
                        var $this = $(this);
                        $this.click(function()
                        {
                                calendar.navigate($this.data('calendar-nav'));
                        });
                });

                $('.btn-group button[data-calendar-view]').each(function()
                {
                        var $this = $(this);
                        $this.click(function()
                        {
                                calendar.view($this.data('calendar-view'));
                        });
                });

                $('#first_day').change(function()
                {
                        var value = $(this).val();
                        value = value.length ? parseInt(value) : null;
                        calendar.setOptions({first_day: value});
                        calendar.view();
                });
        }(jQuery));
    </script>

<div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Programar Mantenimiento</h4>
      </div>
      <div class="modal-body">










        <form action="" method="post" id='formulario'>

                    <p>Escribe la Codigo Interno</p>
                    <input type="number" name="codInterno" id="codInterno"> <input type="button" onclick="buscar_maquina()" value="Buscar"> Nombre maquina:  <input type="button" name="nombre_maquina" id="nombre_maquina">
                    <input type="text" value="" name="codInterno1" id="codInterno1">    <br/><br/>

                    <label for="title">Título</label>
                    <input type="text" required autocomplete="off" name="title" class="form-control" id="title" placeholder="Introduce un título">

                    <br>

                    <label for="from">Fecha Inicio</label>
                    <div class='input-group date' id='from'>
                        <input type='text' id="fro" name="from" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>

                    <br>

                    <label for="to">Fecha Final</label>
                    <div class='input-group date' id='to'>
                        <input type='text' name="to" id="too" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>

                    <br>

                    <label for="tipo">Tipo Mantenimiento</label>

                    <select   class="form-control" name="class" id="tipo" required="" > Seleccione
                         <?php

                       $servidor = "localhost"; 
                        $usuario = "root"; 
                        $contraseña = ""; 
                        $BD = "bdagroinsoft"; 
                        $conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
                        $insertar="SELECT  idTipMantenimiento, CONCAT( nomTipMantenimiento) AS idTipMantenimientonomMantenimiento FROM tipmantenimiento ";
                            $resource=mysqli_query($conexion, $insertar);

                        while($lista=mysqli_fetch_row($resource)){
                                    echo "<option value='".$lista[0]."' class='form-control'>".$lista[1]. "</option>";
                        };
 
                         ?> 
     
    
                         </select>  

                    <br>


                    <label for="body">Observaciones</label>
                    <textarea id="body" name="event" required class="form-control" rows="3" placeholder="Observaciones del Mantenimiento" ></textarea>



                    <div id="contenedor">  
                    </div>

                         <script type="text/javascript">
                              $(function () {
                                   $('#from').datetimepicker({

                                        format: 'dd/mm/yyyy'

                                  });

                                  $('#to').datetimepicker({

                                        format: 'dd/mm/yyyy '

                                            });

                                           });


                                 function buscar_maquina() {
                                var codInterno=document.getElementById('codInterno').value;

                                $("#contenedor").load("consultar_maquina.php",{codInterno:codInterno});

}
    </script>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Agregar</button>
          <input type="button" class="btn btn-success" value="Consultar" onclick="consultar_datos()">
          <input type="button" class="btn btn-success" value="Actualizar" onclick="actualizar_datos()">
          <input type="button" class="btn btn-success" value="Exportar" onclick="exportar_datos()">


          <div id="contenedor">  </div>
        </form>




                    <script>

                    $(document).ready(inicio);

                    function inicio() {
                        alerT("hoiahoahao")
                    }
    




                    function consultar_datos() {
                    var codInterno1=document.getElementById('codInterno1').value;
                    var fro=document.getElementById('fro').value;
                   
                    
                    $("#contenedor").load("consultar_datos.php",{codInterno1:codInterno1, fro:fro});

                    }




                    function actualizar_datos() {
    
                    var codInterno1=document.getElementById('codInterno1').value;
                    var title=document.getElementById('title').value;
                    var fro=document.getElementById('fro').value;
                    var to=document.getElementById('too').value;
                    var tipo=document.getElementById('tipo').value;
                    var body=document.getElementById('body').value;
                    var start=document.getElementById('fro').value;
                    var end=document.getElementById('too').value;


                    $("#contenedor").load("actualizar_datos.php",{codInterno1:codInterno1, title:title, fro:fro, to:to,  tipo:tipo, body:body, start:start, end:end });

                    }


                    function exportar_datos() {
    
                     var formulario=document.getElementById('formulario').action='exp_programado.php';

                     $('#formulario').submit();

                    }

                    </script>


















    </div>
  </div>
</div>
</div>



</body>
</html>
