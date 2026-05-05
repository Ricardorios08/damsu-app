
 <script type="text/javascript">
function ocultamenu(){
  var menu = document.getElementById("Facturacion");
  menu.style.display = "none";
}
function despliega(){
  var menu = document.getElementById("Facturacion");
    if(menu.style.display == "none"){
      menu.style.display = "block";
    }
    else{
      menu.style.display = "none";
    }
}



</script>

<!-- background="../IMAGENES/IZQUIERDA.PNG" -->
<BODY  background="../IMAGENES/fondo.png" onload ="ocultamenu()">

 <div align="center">
    <!-- <li><a href="../a_sectores/secretaria/secretaria.php" target = "izquierda">Secretaria</a> </li> -->
  <IMG SRC="../imagenes/botones/menu/principal.png" alt="Principal" border = "0">
   <a href="../a_sectores/agenda/agenda.php" target = "izquierda"><img src="../imagenes/botones/menu/agenda.png" alt="Auditoria" border = "0" title="Altas de Practicas, metodos, Debitos, etc"></a>
   <a href="../a_sectores/proveeduria/facturacion.php" target = "izquierda"><img src="../imagenes/botones/menu/facturacion.png" alt="Consul. Bioq." border = "0" title="Consultas Varias"></a>
   <a href="../a_sectores/contaduria/contaduria.php" target = "izquierda"><img src="../imagenes/botones/menu/deposito.png" alt="Contaduría" border = "0" title="Altas de Novedades del mes, alta de conceptos, etc"></a>
   <a href="../a_sectores/estadistica/estadistica.php" target = "izquierda"><img src="../imagenes/botones/menu/direccion.png" alt="Estadisticas" border = "0" title="Diferentes estadisticas, Ordenes, Recepcion, etc"></a>
   <a href="../a_sectores/facturacion/facturacion.php" target = "izquierda"><img src="../imagenes/botones/menu/estadisticas.png" alt="Facturación" border = "0" title="Sistema para facturas Obras Sociales, Pre-Facturacion, Consultas"></a>
   <a href="../a_sectores/gerencia/gerencia.php" target = "izquierda"><img src="../imagenes/botones/menu/auditoria.png" alt="Gerencia" border = "0" title="Convenios, Consultas de Convenios, Definir Practicas, convertir nomencladores"></a>
   <a href="../a_sectores/grabacion/grabacion.php" target = "izquierda"><img src="../imagenes/botones/menu/informes.png" alt="Grabacion" border = "0" title="Grabacion de Ordenes, Control de Ordenes, Pami, Consultas, etc"></a>
   <a href="../a_sectores/liquidacion/liquidacion.php" target = "izquierda"><img src="../imagenes/botones/menu/inventario.png" alt="Liquidación" border = "0" title="Armar lista de Facturas, Liquidar, Consultar, Imprimir, etc"></a>
   <a href="../a_sectores/proveeduria/proveeduria.php" target = "izquierda"><img src="../imagenes/botones/menu/preparacion.png" alt="Proveeduría" border = "0" title=""></a>
   <a href="../a_sectores/recepcion/recepcion.php" target = "izquierda"><img src="../imagenes/botones/menu/recepcion.png" alt="Recepción" border = "0" title="Recepcion de Ordenes, Consultas, re-impresiones de planillas, etc."></a>
   <!--<<li><a href="../archivos varios/importar_tablas.php" target = "central">Importar tablas</a> </li>
<li><a href="../a_sectores/consulta_bq/mail.php" target = "central">Consulta a los Programadores</a> </li>-->
  

  
 </div>
