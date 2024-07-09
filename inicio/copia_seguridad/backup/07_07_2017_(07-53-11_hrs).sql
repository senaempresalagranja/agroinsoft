SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS bdagroinsoft;

USE bdagroinsoft;

DROP TABLE IF EXISTS ayuda;

CREATE TABLE `ayuda` (
  `idAyuda` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_formulario` bigint(20) NOT NULL,
  `terAyuda` varchar(60) NOT NULL,
  `conAyuda` varchar(10000) NOT NULL,
  PRIMARY KEY (`idAyuda`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

INSERT INTO ayuda VALUES("12","1","Como Consultar Maquina","la maquina se consulta consultandola tonto");
INSERT INTO ayuda VALUES("13","2","como cosultar una ficha tecnica","pues tiene que consultarla");
INSERT INTO ayuda VALUES("14","3","como poner un registro nuevo","las unicas que ponen son las gallinas");
INSERT INTO ayuda VALUES("15","4","registrar manejecutado","pues si esta ejecutado esta murido");
INSERT INTO ayuda VALUES("16","5","como entrar en la entrada","por la puerta guevon");
INSERT INTO ayuda VALUES("17","6","como salir ","por la puerta pendejo otro pendejo como entrada");
INSERT INTO ayuda VALUES("18","7","como registrar un cuenta dante","registrando el cuenta todo");
INSERT INTO ayuda VALUES("19","8","como proveer lo del prveedor","proveiendo los proveidores que proveen");
INSERT INTO ayuda VALUES("20","9","el visor que muestra?","lo que esta viendo pendejo");
INSERT INTO ayuda VALUES("21","10","como consultar la maquina e cosnultas","en el boton que esta  la derecha del medio del boton de que te importa");
INSERT INTO ayuda VALUES("22","11","como cosultar un novedad que fue hecha","no me diga .|.");
INSERT INTO ayuda VALUES("23","12","como consultar mantenimiento ejecutado","pues abajo esta un boton que dice ayuda presionalo");
INSERT INTO ayuda VALUES("24","13","como consulltar lo que se prgramo?","pues busca en el calendario del celular en tareas");
INSERT INTO ayuda VALUES("25","14","COMO CON SULTAR ENTRADAS","pues quedese en la puerta y espere");
INSERT INTO ayuda VALUES("26","15","CONSULTAR SALIDAS","PUES ESPERE AFUERA");
INSERT INTO ayuda VALUES("27","16","consultar cuentadante","cuente de 1 en 1 hasta 10 y vera");
INSERT INTO ayuda VALUES("28","17","conuslra proveedor","proveeeedasdfñmsdfjsd");



DROP TABLE IF EXISTS cargo;

CREATE TABLE `cargo` (
  `idCargo` bigint(20) NOT NULL AUTO_INCREMENT,
  `nomCargo` varchar(30) NOT NULL,
  PRIMARY KEY (`idCargo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO cargo VALUES("1","APRENDIZ");
INSERT INTO cargo VALUES("2","INSTRUCTOR");



DROP TABLE IF EXISTS clasificacion;

CREATE TABLE `clasificacion` (
  `idClasificacion` bigint(20) NOT NULL AUTO_INCREMENT,
  `nomClasificacion` varchar(40) NOT NULL,
  PRIMARY KEY (`idClasificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO clasificacion VALUES("1","REFRIGERACION");
INSERT INTO clasificacion VALUES("2","ALMACENAMIENTO");
INSERT INTO clasificacion VALUES("3","PRODUCCION");



DROP TABLE IF EXISTS criticidad;

CREATE TABLE `criticidad` (
  `idCriticidad` bigint(20) NOT NULL AUTO_INCREMENT,
  `nomCriticidad` varchar(20) NOT NULL,
  `desCriticidad` varchar(500) NOT NULL,
  PRIMARY KEY (`idCriticidad`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO criticidad VALUES("1","ALTA","PORQUE SI");
INSERT INTO criticidad VALUES("2","MEDIA","MEDIA PERDIDA O MEDIA NARANJA");
INSERT INTO criticidad VALUES("3","BAJA","BAJA OSCURA");



DROP TABLE IF EXISTS cuentadante;

CREATE TABLE `cuentadante` (
  `idCuentadante` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipDocumento` varchar(20) NOT NULL,
  `numDocumento` varchar(30) NOT NULL,
  `nomCuentadante` varchar(40) NOT NULL,
  `apeCuentadante` varchar(40) NOT NULL,
  `fecNacimiento` date NOT NULL,
  `idCargo` bigint(20) NOT NULL,
  `telCuentadante` varchar(20) NOT NULL,
  `emaCuentadante` varchar(40) NOT NULL,
  `dirCuentadante` varchar(40) NOT NULL,
  PRIMARY KEY (`idCuentadante`),
  KEY `idCargo` (`idCargo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO cuentadante VALUES("1","TARJETA DE IDENTIDAD","99050809737","LAURA VANNESA","SANCHEZ ARCINIEGAS","1999-05-08","1","3124236673","lvsanchez7378@misena.edu.co","GUAMO");
INSERT INTO cuentadante VALUES("2","C.C.","99020607641","cristian camilo","herrera barbosa","1999-02-06","1","3203892933","ccherrera146@misena.edu.co","la mesa ");
INSERT INTO cuentadante VALUES("3","TARJETA DE IDENTIDAD","11105691815","joaquin reyes","reyes","1998-04-29","2","1242112312","joauqim@gmail.com","oiahsdfohsd");



DROP TABLE IF EXISTS entradas;

CREATE TABLE `entradas` (
  `idEntradas` bigint(20) NOT NULL AUTO_INCREMENT,
  `idMaqEquipo` bigint(20) NOT NULL,
  `fecEntrada` date NOT NULL,
  `estMaqEntrada` varchar(20) NOT NULL,
  `idUbicacion` bigint(20) NOT NULL,
  `procedimiento` varchar(1000) NOT NULL,
  `nomPer` varchar(60) NOT NULL,
  `cedPer` varchar(20) NOT NULL,
  PRIMARY KEY (`idEntradas`),
  KEY `idMaqEquipo` (`idMaqEquipo`),
  KEY `idUbicacion` (`idUbicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO entradas VALUES("6","1","2017-05-13","BUENO","1","ssss","joaquin reyes","1234567890");
INSERT INTO entradas VALUES("20","33","2017-07-05","BUENO","1","Xx","X","123");



DROP TABLE IF EXISTS eventos;

CREATE TABLE `eventos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idmaquina` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `observaciones` text COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `class` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'event-important',
  `start` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `end` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_actual` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_programada` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `columna_agroinsoft` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `columna_agroinsoft1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `columna_agroinsoft2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `columna_agroinsoft3` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `columna_agroinsoft4` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO eventos VALUES("7","DADS","ASDASD","http://localhost/calendario/descripcion_evento.php?id=7","event-success","1489013400000","1489272600000","08/03/2017 19:50","11/03/2017 19:50","","","","","");
INSERT INTO eventos VALUES("8","asdasd","asdasd","http://localhost/calendario/descripcion_evento.php?id=8","event-success","1500508620000","1499990220000","19/07/2017 19:57","13/07/2017 19:57","","","","","");
INSERT INTO eventos VALUES("9","asdsa","dasdsad","http://localhost/calendario/descripcion_evento.php?id=9","event-info","1489618680000","1490309880000","15/03/2017 19:58","23/03/2017 19:58","","","","","");
INSERT INTO eventos VALUES("10","adssad","asdasd","http://localhost/calendario/descripcion_evento.php?id=10","event-info","1489016280000","1489621080000","08/03/2017 20:38","15/03/2017 20:38","","","","","");
INSERT INTO eventos VALUES("11","DASDA","GHFAFDAS","http://localhost/calendario/descripcion_evento.php?id=11","event-info","1489016460000","1489621260000","08/03/2017 20:41","15/03/2017 20:41","aqui pone el valor","aqui pone el valor","aqui pone el valor","aqui pone el valor","aqui pone el valor");



DROP TABLE IF EXISTS fictecnica;

CREATE TABLE `fictecnica` (
  `idFicTecnica` bigint(20) NOT NULL AUTO_INCREMENT,
  `idMaqEquipo` bigint(20) NOT NULL,
  `funUsos` varchar(1000) NOT NULL,
  `desFisica` varchar(1000) NOT NULL,
  `espTecnica` varchar(1000) NOT NULL,
  `conSeguridad` varchar(1000) NOT NULL,
  `alistamiento` varchar(1000) NOT NULL,
  `verCalibracion` varchar(1000) NOT NULL,
  `instrucciones` varchar(1000) NOT NULL,
  `condiciones` varchar(1000) NOT NULL,
  `mantenimiento` varchar(1000) NOT NULL,
  `limDesinfeccion` varchar(1000) NOT NULL,
  `conManejo` varchar(1000) NOT NULL,
  PRIMARY KEY (`idFicTecnica`),
  KEY `idMaqEquipo` (`idMaqEquipo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO fictecnica VALUES("1","1","ljhljhlkjh","lkjhlkjhkljh","lkjhlkjhlkj","hlkjhlkj","hlkj","hlkj","hlkj","hlkj","hlkj","hlkj","h");



DROP TABLE IF EXISTS manejecutado;

CREATE TABLE `manejecutado` (
  `idManEjecutado` bigint(20) NOT NULL AUTO_INCREMENT,
  `id` bigint(20) NOT NULL,
  `idTipMantenimiento` bigint(20) NOT NULL,
  `idProveedor` bigint(20) NOT NULL,
  `fecEjecutado` date NOT NULL,
  `procedimiento` varchar(1000) NOT NULL,
  `recomendaciones` varchar(1000) NOT NULL,
  `garantia` varchar(20) NOT NULL,
  `nomPerMantenimiento` varchar(60) NOT NULL,
  `cedPerMantenimiento` varchar(20) NOT NULL,
  PRIMARY KEY (`idManEjecutado`),
  KEY `idMaqEquipo` (`id`),
  KEY `idTipMantenimiento` (`idTipMantenimiento`),
  KEY `idProveedor` (`idProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO manejecutado VALUES("5","43","1","1","2017-05-12","asd","asd","asd","asd","123");



DROP TABLE IF EXISTS manprogramado;

CREATE TABLE `manprogramado` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idMaqEquipo` bigint(20) NOT NULL,
  `title` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `body` text COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `class` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'event-important',
  `start` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `end` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `inicio_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `final_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idMaqEquipo` (`idMaqEquipo`),
  KEY `class` (`class`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

INSERT INTO manprogramado VALUES("41","1","joauqin","sss","http://localhost/agroinsoft/inicio/form_Programar/descripcion_evento.php?id=41","1","1494478800000","1495602000000","11/05/2017","24/05/2017 ");
INSERT INTO manprogramado VALUES("42","1","sss","sss","http://localhost/agroinsoft/inicio/form_Programar/descripcion_evento.php?id=42","1","1497070800000","1498712400000","10/06/2017","29/06/2017 ");
INSERT INTO manprogramado VALUES("43","1","ssssssss","sss","http://localhost/agroinsoft/inicio/form_Programar/descripcion_evento.php?id=43","1","1495774800000","1496379600000","26/05/2017","02/06/2017 ");
INSERT INTO manprogramado VALUES("44","1","PRUEBA FINAL","XXX","http://localhost/agroinsoft/inicio/form_Programar/descripcion_evento.php?id=44","1","1494478800000","1494565200000","11/05/2017","12/05/2017 ");
INSERT INTO manprogramado VALUES("45","1","mantenimieno Importante","prueba","http://localhost:8080/agroinsoft/inicio/form_Programar/descripcion_evento.php?id=45","2","1499230800000","1499317200000","05/07/2017","06/07/2017 ");
INSERT INTO manprogramado VALUES("46","33","pruebassss","xxxxxxxx","http://localhost:8080/agroinsoft/inicio/form_Programar/descripcion_evento.php?id=46","1","09/07/2017","11/07/2017 ","09/07/2017","11/07/2017 ");
INSERT INTO manprogramado VALUES("47","3","PROGRAMACION","C","http://localhost:8080/agroinsoft/inicio/form_Programar/descripcion_evento.php?id=47","1","1499922000000","1500181200000","13/07/2017","16/07/2017 ");
INSERT INTO manprogramado VALUES("48","5","PROGRAMACION","XX","http://localhost:8080/agroinsoft/inicio/form_Programar/descripcion_evento.php?id=48","1","1500526800000","1500872400000","20/07/2017","24/07/2017 ");



DROP TABLE IF EXISTS maqyequipo;

CREATE TABLE `maqyequipo` (
  `idMaqEquipo` bigint(20) NOT NULL AUTO_INCREMENT,
  `nomElemento` varchar(60) NOT NULL,
  `codInventario` varchar(20) NOT NULL,
  `codInterno` varchar(20) NOT NULL,
  `marElemento` varchar(40) NOT NULL,
  `seriale` varchar(20) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `capacidad` varchar(20) NOT NULL,
  `fecAdquisicion` date NOT NULL,
  `idUbicacion` bigint(20) NOT NULL,
  `estElemento` varchar(30) NOT NULL,
  `idCuentadante` bigint(20) NOT NULL,
  `numFicTecnica` int(20) NOT NULL,
  `idClasificacion` bigint(20) NOT NULL,
  `imagen` varchar(60) NOT NULL,
  PRIMARY KEY (`idMaqEquipo`),
  KEY `idUbicacion` (`idUbicacion`),
  KEY `idCuentadante` (`idCuentadante`),
  KEY `idClasificacion` (`idClasificacion`),
  KEY `idClasificacion_2` (`idClasificacion`),
  KEY `idCuentadante_2` (`idCuentadante`),
  KEY `idClasificacion_3` (`idClasificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

INSERT INTO maqyequipo VALUES("1","MARMITA","12345678","12345","BYG","SDDFD","DFSERE","3L","2017-02-01","4","NO USO","1","445","3","MARMITA.jpg");
INSERT INTO maqyequipo VALUES("2","LICUADORA","331","01122","HANAJ","22BB1212","2017","1MMN2","2017-02-28","4","en uso","1","2","1","iconmonstr-magnifier-4-icon.png");
INSERT INTO maqyequipo VALUES("3","OLLA PITADORA","21368721","1096","MAMUT","1212V","2075CGC","1808MRYV","2017-02-28","2","en uso","2","3","3","MUSICAIpng.png");
INSERT INTO maqyequipo VALUES("4","DESPULPADORA","8979834732","13244","YUNUTABA","1212V","2075CGC","1808MRYV","2017-02-28","4","en uso","2","3","3","PublicaciÃ³n1.jpg");
INSERT INTO maqyequipo VALUES("5","TAJADORA","636746","2627","YAMAH","1212V","2075CGC","1808MRYV","2017-02-28","4","en uso","1","3","3","CAMILO - InstagramCapture_c8d49b90-3f62-4d28-b5e2-9fde4f64b5");
INSERT INTO maqyequipo VALUES("6","EMPAQUETADORA INDUSTRIAL","3248234","13245","AVICHUCHO","43CFC54","2017","23HVH","2017-02-28","3","en uso","1","4","1","CAMILO - WP_20140816_22_09_32_Pro.jpg");
INSERT INTO maqyequipo VALUES("7","BATIDORA INDUSTRIAL","7824873","108901","MIKALAKO","5FV66FFV677","2017","1MMN2","2017-02-28","4","en uso","1","5","1","CAMILO - 6tag_200915-213730.jpg");
INSERT INTO maqyequipo VALUES("8","METRALLADORA","7448374","0849734","NATISPARIS","8F897F898","2017","1MMN2","2017-02-16","3","en uso","1","6","2","LATITUDE-E5450 - marketer tools.png");
INSERT INTO maqyequipo VALUES("9","TREDEBUNDA","92897","039408","CAMISER","HD68376D65","2017","MMD1","2017-02-03","2","en uso","1","8","2","11-512.png");
INSERT INTO maqyequipo VALUES("10","SALADERA","9237","03823","CAMISBE","C75F67F6","2017","MDM86","2017-02-16","3","no uso","1","10","1","ace-planeacion-3-icon-1000.png");
INSERT INTO maqyequipo VALUES("11","BU","99878","990508","SED","DFRD","2017","XXXX","2017-03-13","1","en uso","1","0","1","ANonymous.png");
INSERT INTO maqyequipo VALUES("26","CLARIN","12345678","11111111","BYG","SDDFD","DFSERE","3L","2017-02-01","1","no uso","1","445","2","Chrysanthemum.jpg");
INSERT INTO maqyequipo VALUES("27","zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz","78548564","11089","xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx","trsthrs","fuitfuitf","ufuyfui","2017-03-01","1","en uso","1","1234567890","1","");
INSERT INTO maqyequipo VALUES("28","mmmmmmmmmmmmmmmmmmmmmmmmmmmm","78548564","22222","xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx","trsthrs","fuitfuitf","ufuyfui","2017-03-01","1","en uso","1","1234567890","1","");
INSERT INTO maqyequipo VALUES("29","ANGUSI","234214","937","dfw","ewgewg","sgfseg","efgegf","2017-05-10","2","NO USO","2","34","2","GATO.jpg");
INSERT INTO maqyequipo VALUES("30","MARMITA","12345678","12345","BYG","SDDFD","DFSERE","3L","2017-02-01","4","NO USO","1","445","3","");
INSERT INTO maqyequipo VALUES("32","MILENIUM","12345678","0429","BYG","SDDFD","DFSERE","3L","2017-02-01","4","NO USO","1","445","3","14d2fd8360660f5482b7b86e4d51ddd4.jpg");
INSERT INTO maqyequipo VALUES("33","MIMITA","1096123","1096123","JAVAR","12465X4S5XD","545S","100QW","2017-05-02","2","EN USO","1","12","2","jj.jpg");



DROP TABLE IF EXISTS novedades;

CREATE TABLE `novedades` (
  `idNovedad` bigint(20) NOT NULL AUTO_INCREMENT,
  `idMaqEquipo` bigint(20) NOT NULL,
  `tipNovedad` varchar(20) NOT NULL,
  `fecNovedad` date NOT NULL,
  `perNovedad` varchar(60) NOT NULL,
  `cedPerNovedad` varchar(20) NOT NULL,
  `espNovedad` varchar(1000) NOT NULL,
  `prioridad` varchar(30) NOT NULL,
  PRIMARY KEY (`idNovedad`),
  KEY `idMaqEquipo` (`idMaqEquipo`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

INSERT INTO novedades VALUES("21","1","DAÃ‘O","2017-05-19","LAura","123","Se me cayo","BAJA");
INSERT INTO novedades VALUES("22","1","MAL FUNCIONAMIENTO","2017-05-19","Laura","123","la golpee","BAJA");
INSERT INTO novedades VALUES("23","1","NO ENCIENDE","2017-07-04","jkhbubgiun","654887498","jhbujbvgiubgiunnnnnn","BAJA");
INSERT INTO novedades VALUES("24","33","MAL FUNCIONAMIENTO","2017-07-06","LAURA SANCHEZ","1006002118","NO FUNCIONA","ALTA");
INSERT INTO novedades VALUES("25","5","DAÃ‘O","2017-07-07","LAURA SANCHEZ","123","SE CAYO","MEDIA");



DROP TABLE IF EXISTS proveedor;

CREATE TABLE `proveedor` (
  `idProveedor` bigint(20) NOT NULL AUTO_INCREMENT,
  `nomProveedor` varchar(40) NOT NULL,
  `nitProveedor` varchar(50) NOT NULL,
  `telProveedor` varchar(20) NOT NULL,
  `dirProveedor` varchar(30) NOT NULL,
  `emaProveedor` varchar(50) NOT NULL,
  `sitWebProveedor` varchar(100) NOT NULL,
  PRIMARY KEY (`idProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO proveedor VALUES("1","MOMIGA","1322424344555","322112343","IBAGUE","MOMI@gmail.com","kjsnsancs.com");
INSERT INTO proveedor VALUES("2","LALITA","10938729874324897138","2387348274","GUAMO","HASBHJASSSS@GMAIL.COM","HDFNHDF.COM");
INSERT INTO proveedor VALUES("3","LOS GASOLINEROS","123456789","3219048473","cll9 n2n43","gasolineros@gmial.com","www.gasolineros.com");



DROP TABLE IF EXISTS salidas;

CREATE TABLE `salidas` (
  `idSalidas` bigint(20) NOT NULL AUTO_INCREMENT,
  `idMaqEquipo` bigint(20) NOT NULL,
  `fecSalida` date NOT NULL,
  `fecLimRegreso` date NOT NULL,
  `idProveedor` bigint(20) NOT NULL,
  `idUbicacion` bigint(20) NOT NULL,
  `idCuentadante` bigint(20) NOT NULL,
  `destino` varchar(50) NOT NULL,
  PRIMARY KEY (`idSalidas`),
  KEY `idMaqEquipo` (`idMaqEquipo`),
  KEY `idProveedor` (`idProveedor`),
  KEY `idUbicacion` (`idUbicacion`),
  KEY `idCuentadante` (`idCuentadante`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO salidas VALUES("4","4","2017-05-14","2017-05-31","1","1","1","sss");
INSERT INTO salidas VALUES("5","33","2017-07-04","2017-07-07","3","1","1","espinal");



DROP TABLE IF EXISTS solicitudes;

CREATE TABLE `solicitudes` (
  `idSolicitudes` bigint(20) NOT NULL AUTO_INCREMENT,
  `idNovedad` bigint(20) NOT NULL,
  `idCriticidad` bigint(20) NOT NULL,
  `numOrden` int(11) NOT NULL,
  `solicitante` varchar(60) NOT NULL,
  `fecSolicitud` date NOT NULL,
  `traRealizar` varchar(100) NOT NULL,
  `idtipMantenimiento` bigint(20) NOT NULL,
  `tipServicio` varchar(20) NOT NULL,
  `prioridad` varchar(10) NOT NULL,
  `lugMantenimiento` varchar(30) NOT NULL,
  PRIMARY KEY (`idSolicitudes`),
  KEY `idNovedad` (`idNovedad`),
  KEY `idtipMantenimiento` (`idtipMantenimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO solicitudes VALUES("5","21","1","1","lauraaaaaa","2017-06-06","asdasdas","1","Electrico","Baja","Planta");
INSERT INTO solicitudes VALUES("6","23","2","2","LAUR","2017-07-04","LA VERDAD NO SE","1","Electrico","Baja","Externo");
INSERT INTO solicitudes VALUES("7","24","1","1","LAURA SANCHEZ","2017-07-06","ARREGLAR","1","Mecanico","Alta","Planta");



DROP TABLE IF EXISTS tipmantenimiento;

CREATE TABLE `tipmantenimiento` (
  `idTipMantenimiento` bigint(20) NOT NULL AUTO_INCREMENT,
  `nomTipMantenimiento` varchar(20) NOT NULL,
  PRIMARY KEY (`idTipMantenimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tipmantenimiento VALUES("1","CORRECTIVO");
INSERT INTO tipmantenimiento VALUES("2","PREVENTIVO");



DROP TABLE IF EXISTS ubicacion;

CREATE TABLE `ubicacion` (
  `idUbicacion` bigint(20) NOT NULL AUTO_INCREMENT,
  `nomUbicacion` varchar(30) NOT NULL,
  PRIMARY KEY (`idUbicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO ubicacion VALUES("1","LACTEOS");
INSERT INTO ubicacion VALUES("2","CARNICOS");
INSERT INTO ubicacion VALUES("3","PANIFICACION");
INSERT INTO ubicacion VALUES("4","FRUHOR");



DROP TABLE IF EXISTS usuario;

CREATE TABLE `usuario` (
  `idUsuario` bigint(20) NOT NULL AUTO_INCREMENT,
  `nomUsuario` varchar(30) NOT NULL,
  `contrasena` varchar(200) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO usuario VALUES("1","Administrador","$2y$12$cwGg./bu1yCq8pPWTBpdrODXB3/Q8Uk2NoNwtgr0HRxsQAiV4vsPS");
INSERT INTO usuario VALUES("2","Captura","$2y$12$pjKfSSlfmUuuUymOcZzTXOoaBY00u/7O1wk0BbJ55aAtwWsuGyfv2");



SET FOREIGN_KEY_CHECKS=1;