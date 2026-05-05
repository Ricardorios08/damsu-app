<?php 

$wsdl='http://coprofi.com.ar/sulb/nusoap/lib/servicio_papo.php?wsdl';
$client1=new nusoap_client($wsdl, 'wsdl'); 

$param1=array('sql'=>$sql9); 
echo $response= $client1->call('pacientes', $param1);

?>

