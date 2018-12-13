<?php
/*
 * Functions of API resources.
 */

include 'signInAws.php';

$host = "arq-akiaianm5wou3yspxecq-us-east-1.amazonaws.com";  
$ch = '001-general';

/**
 * Encapsula el consumo del servicio de validacion de cliente del API y retorna la respuesta del servicio
 */
function valCli($cliId, $phoneNumber, $val) {
  $servicePath = "/cl/-services-cli-validlient";

  $body = getBodyValCli($GLOBALS['channel'], $cliId, $phoneNumber, $val);

  $response = signRequest($GLOBALS['host'], $servicePath, 'POST', $body);  
  if(json_decode($response) == null){
    return $response;
  }else{
    return json_decode($response);
  }
}
/**
 * Forma el cuerpo para consumir el servicio de validación de cliente del API
 */
function getBodyValCli($ch, $cliId, $phone, $val){
  $msgId =  substr(strval((new DateTime())->getTimestamp()), 0, 9);
  return array(
    "RequestMessage"  => array(
      "RequestHeader"  => array (
        "Channel" => $ch,
        "RequestDate" => gmdate("Y-m-d\TH:i:s\\Z"),
        "MessageID" => $msgId,
        "ClientID" => $cliId),
      "RequestBody"  => array (
        "any" => array (
          "validateClientRQ" => array (
            "phoneNumber" => $phone,
            "value" => $val
            )
        )
      )
    )
  );
}

?>