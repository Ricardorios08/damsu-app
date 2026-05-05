<?php
	require_once('./includes/nusoap.php');
	require_once('./config.php');

	$tipo = "SOAP";
		
	$oSoap = new soapclient2($wsdl, false);
	$oSoap->setHeaders(file_get_contents($XmlSeguridad));

	if($oSoap->fault) {		
		echo "Error: ";
		var_dump($oSoap);			
	}


	function SendMedicamentos($args,$user,$pass){	
		global $oSoap;
		$par = "";
		foreach($args as $index=>$array){
			$par.="<arg0>";
			foreach($array as $c=>$v){
				$par.= "<".$c.">".$v."</".$c.">";
			}
			$par.="</arg0>";
		}
		$par.="<arg1>".$user."</arg1><arg2>".$pass."</arg2>";
		
		$response = $oSoap->call("sendMedicamentos", $par, '');
		
		/*
		echo '<h2>Request</h2><pre>' . htmlspecialchars($oSoap->request, ENT_QUOTES) . '</pre>';
		echo '<h2>Response</h2><pre>' . htmlspecialchars($oSoap->response, ENT_QUOTES) . '</pre>';
		echo '<h2>Debug</h2><pre>' . htmlspecialchars($oSoap->debug_str, ENT_QUOTES) . '</pre>';

		$err = "";
		if($oSoap->fault) {		
		 $err = $oSoap->getError();
		}

		echo "<br>";
		echo "<br>";

		echo "resultado: ".$response['resultado']."<br>";
		echo "codigoTransaccion: ".$response['codigoTransaccion']."<br>";

		$errores = $response['errores'];

		$i=0;
		while (isset($errores[$i]))
		{
			echo "Error ".$i." : ".$errores[$i];
			echo "<br>";
			$i++;
		}
		*/
		return $response;
	}

	function SendMedicamentosDHSerie($args,$user,$pass){
		global $oSoap;

		foreach($args as $index=>$array){
			$par.="<arg0>";
			foreach($array as $c=>$v){
				$par.= "<".$c.">".$v."</".$c.">";
			}
			$par.="</arg0>";
		}

		$par.="<arg1>".$user."</arg1><arg2>".$pass."</arg2>";

		/*
		$par="<arg0><f_evento>01052011</f_evento><h_evento>23:5a</h_evento><gln_origen>123</gln_origen><cuit_origen>20259171289</cuit_origen><gln_destino>GLN</gln_destino><cuit_destino>20259171289</cuit_destino><n_remito>1</n_remito><n_factura>1</n_factura><vencimiento>01052011</vencimiento><gtin>1</gtin><lote>1</lote><desde_numero_serial>1600</desde_numero_serial><hasta_numero_serial>1610</hasta_numero_serial><id_evento>1</id_evento></arg0>";
		*/
		

		$response = $oSoap->call("sendMedicamentosDHSerie", $par, '');
		/*
		echo '<h2>Request</h2><pre>' . htmlspecialchars($oSoap->request, ENT_QUOTES) . '</pre>';
		echo '<h2>Response</h2><pre>' . htmlspecialchars($oSoap->response, ENT_QUOTES) . '</pre>';
		echo '<h2>Debug</h2><pre>' . htmlspecialchars($oSoap->debug_str, ENT_QUOTES) . '</pre>';

		$err = "";
		if($oSoap->fault) {		
		 $err = $oSoap->getError();
		}

		echo "<br>";
		echo "<br>";

		echo "resultado: ".$response['resultado']."<br>";
		echo "codigoTransaccion: ".$response['codigoTransaccion']."<br>";

		$errores = $response['errores'];

		$i=0;
		while (isset($errores[$i]))
		{
			echo "Error ".$i." : ".$errores[$i];
			echo "<br>";
			$i++;
		}
		*/
		return $response;
	}

	function SendCancMedicamentos($arg,$user,$pass){
		global $oSoap;

		$par ="<arg0>".$arg."</arg0><arg1>".$user."</arg1><arg2>".$pass."</arg2>";
		
		$response = $oSoap->call("sendCancelacTransacc", $par, '');
		/*
		echo '<h2>Request</h2><pre>' . htmlspecialchars($oSoap->request, ENT_QUOTES) . '</pre>';
		echo '<h2>Response</h2><pre>' . htmlspecialchars($oSoap->response, ENT_QUOTES) . '</pre>';
		echo '<h2>Debug</h2><pre>' . htmlspecialchars($oSoap->debug_str, ENT_QUOTES) . '</pre>';

		$err = "";
		if($oSoap->fault) {		
		 $err = $oSoap->getError();
		}

		echo "<br>";
		echo "<br>";

		echo "resultado: ".$response['resultado']."<br>";
		echo "codigoTransaccion: ".$response['codigoTransaccion']."<br>";

		$errores = $response['errores'];

		$i=0;
		while (isset($errores[$i]))
		{
			echo "Error ".$i." : ".$errores[$i];
			echo "<br>";
			$i++;
		}
		*/
		return $response;
	}

?>