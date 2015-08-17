<?php
	header("Access-Control-Allow-Origin: *");
	// REST import
	$RESTstring = file_get_contents('http://nhs-json.azurewebsites.net');
	$RESTarray = explode(':::',$RESTstring);

	$serverName = $RESTarray[1];
	$serverAdmin = $RESTarray[3];
	$serverPassword = $RESTarray[5];

	// Server details
	$dbname = "appetite";

	$serverID = $serverAdmin . "@" . $serverName;
	$server = "tcp:" . $serverName . ".database.windows.net,1433";
	$connectionOptions = array( "Database"=>$dbname, "UID"=>$serverID, "PWD"=>$serverPassword);

	$conn = sqlsrv_connect($server, $connectionOptions);
/*
	echo $server;
	echo $serverID;
*/
	if($conn == false) {
	    echo 'Connection failed. ';
	    die(print_r(sqlsrv_errors(), true));
	}

	session_start();
?>