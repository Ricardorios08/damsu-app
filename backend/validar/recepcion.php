
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


<BODY background="../IMAGENES/IZQUIERDA.PNG" onload ="ocultamenu()">

 <ul class="ej01">
<font color="#0000FF"><strong>SECTORES</strong></font>
<li><a href="../a_sectores/recepcion/recepcion.php" target = "izquierda">Recepción</a> </li>
<li><a href="../a_sectores/nomencladores/nomencladores.php" target = "izquierda">Nomencladores</a> </li>

<!--<li><a href="../a_sectores/consulta_bq/mail.php" target = "central">Consulta a los Programadores</a> </li>-->



