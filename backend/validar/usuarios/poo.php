<html>
<head>
<title>Pruebas</title>
</head>
<body>
<?php

include("adodb.inc.php");
$db = NewADOConnection('mysql');
$db->Connect("localhost", "root", "", "oncologico");

$sql= "select * from usuario where id = '$id'" ;
$result = $db->Execute($sql);

$rol=strtoupper($result->fields["rol"]);
$programa=strtoupper($result->fields["programa"]);
$usuario=strtoupper($result->fields["usuario"]);
$id=strtoupper($result->fields["id"]);


class ver_operador {
  private $nombre;
  public function inicializar($nom)
  {

    $this->nombre=$usuario;
  }
  public function imprimir()
  {
    echo $this->nombre;

  }
}

$per1=new ver_operador();
$per1->imprimir();

?>
</body>
</html>