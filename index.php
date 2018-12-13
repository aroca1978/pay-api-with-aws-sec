<?php  
/*
 * App to use customer payment api
 * Andres Roca Jaramillo info@elcanaldepancha.com
 */
	include 'cliApi.php';

	echo "Test to consume customer pyment api"."<br>"."<br>";

	$valCliResponse = valCli("12345443", "0703914514", "0");

	echo json_encode($valCliResponse);

?>