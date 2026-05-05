<?php 

include ("../../conexiones/usuario.php");

switch ($rol){
case "ADMIN":{include ("admin.php");break;}
case "SECRETARIA":{include ("secretaria.php");break;}
case "MESA DE ENTRADA":{include ("mesa_entrada.php");break;}
case "MESA DE ENTRADA":{include ("mesa_entrada.php");break;}
case "PREPARACION":{include ("preparacion.php");break;}
case "PREPARACION":{include ("preparacion.php");break;}
case "PREPARACION":{include ("preparacion.php");break;}
case "FACTURACION":{include ("facturacion.php");break;}
case "FACTURACION":{include ("facturacion.php");break;}
case "DEPOSITO Y ADMINISTRACION":{include ("deposito.php");break;}
case "DEPOSITO Y ADMINISTRACION":{include ("deposito.php");break;}
case "DIRECTORA TECNICA":{include ("direccion.php");break;}
case "JEFATURA":{include ("jefatura.php");break;}


}


