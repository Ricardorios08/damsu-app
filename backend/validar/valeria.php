
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
<li><a href="../a_sectores/secretaria/secretaria.php" target = "izquierda">Secretaria</a> </li>

<li><a href="../a_sectores/facturacion/facturacion.php" target = "izquierda">Facturacion</a></li>
<li><a href="../a_sectores/tesoreria/tesoreria.php" target = "izquierda">Tesoreria</a> </li>
<li><a href="../a_sectores/liquidacion/liquidacion.php" target = "izquierda">Liquidacion</a></li>


