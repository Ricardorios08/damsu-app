<style type="text/css">
<!--
.Estilo2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo5 {font-size: 12px}
.Estilo74 {font-family: Arial, Helvetica, sans-serif}
.Estilo75 {
	font-family: "Trebuchet MS";
	font-size: 12px;
}
-->
</style>
 


<body > 



<?php 

$nro_factura;




?>
<style type="text/css">
<!--
.Estilo5 {font-family: Arial, Helvetica, sans-serif}
.Estilo8 {
	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
}
.Estilo70 {font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
.Estilo72 {font-size: 12px}
.Estilo72 {font-family: Arial, Helvetica, sans-serif}
.Estilo74 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
-->
</style>

<?php

ECHO "**".$gtin = $_REQUEST['gtin'];

?>

<FORM ACTION="diario_vta_detallado_lector_separar.php" method="post" TARGET = "central1">
<table width="800" border="0" cellspacing="0">
  <!--DWLayoutTable-->
<tr valign="middle" bgcolor="#F0F0F0">
    <td colspan="9"><div align="center" class="Estilo74">
      Gtin: 
        <input name="gtin" type="text" id="gtin">
          <input type="submit" name="Submit" value="Recibir">
    </div></td>
  </tr>
</table>

</form>


