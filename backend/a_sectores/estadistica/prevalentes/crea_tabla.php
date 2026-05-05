<?php 


include ("../../../conexiones/config_usu.php");

 $desde1 = '2013-01-01';
 $hasta1 = '2013-12-31';


$base = "oncologico";

 $sql1 = "DROP TABLE `cantidad_dptos`";
 $result1 = $db->Execute($sql1);


 $sql = "CREATE TABLE IF NOT EXISTS `cantidad_dptos` (
 `apellido` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `documento` INT(10) NOT NULL,
  `departamento` varchar(40) NOT NULL,
  `provincia` varchar(40) NOT NULL,
  `fecha_nac` date NOT NULL DEFAULT '0000-00-00',
 `cod_diagnostico` varchar(10) NOT NULL,
`sexo` varchar(20) NOT NULL,
`radio` varchar(1) NOT NULL,
`quimio` varchar(1) NOT NULL,
`anio_2009` varchar(4) NOT NULL,
`anio_2010` varchar(4) NOT NULL,
`anio_2011` varchar(4) NOT NULL,
`anio_2012` varchar(4) NOT NULL,
`anio_2013` varchar(4) NOT NULL,
`anio_2014` varchar(4) NOT NULL,
`anio_2015` varchar(4) NOT NULL


  ) ENGINE=MyISAM";

  


$result1 = $db->Execute($sql);

 
