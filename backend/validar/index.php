<!-- <frameset rows="100,550" frameborder="YES" border="0" framespacing="0" scrolling="NO" noresize >

  <frame src="../drivers/frames/frame_arriba.html" name="arriba" scrolling="NO" noresize >
	  <frameset rows="*" cols="165,*" framespacing="0" frameborder="no" border="0" >
			<frame src="../validar/admin.php" name="izquierda" scrolling="auto" noresize>
			<frame src="../validar/cuadros.htm" name="central" scrolling="autos">
	  </frameset>

</frameset> -->


<?php 
include ("conexiones/config_usu.php");
$sel =$_POST["seleccionado"];
$user = $_POST["usuario"];
$pass = $_POST["password"];


$sql= "select * from usuarios where usuario = '$user' and contraseña = '$pass'" ;
$result = $db->Execute($sql);

$rol=strtoupper($result->fields["rol"]);
$programa=strtoupper($result->fields["programa"]);
$usuario=strtoupper($result->fields["usuario"]);
$id=strtoupper($result->fields["id"]);

switch($rol)
	{

		case "ADMIN":{

session_start ();
session_register ("$user");
session_register ("$pass");

//header ("Location: ../validar/admin.php");	
//header ("Location: ../validar/cuadros.htm");	
//include ("../validar/presentacion.php");
//include ("../validar/frames.php");
include ("aindex.html");
		
			break;


	}

			case "":{

session_start ();
session_register ("$user");
session_register ("$pass");

//header ("Location: ../validar/admin.php");	
//header ("Location: ../validar/cuadros.htm");	
//include ("../validar/presentacion.php");
//include ("../validar/frames.php");
include ("index.html");
		
			break;


	}

	}


?>


