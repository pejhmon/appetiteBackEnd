<?php
	function sqlsrv_escape_string($string)
	{
	    if (get_magic_quotes_gpc()) {
	        $string = stripslashes($string);
	    }
	    return str_replace("'", "''", $string);
	}
	
	function errorparse($result){
		//Saves the retrieved data as an array
		$json = array();
		$json[]= array(
			'return' => $result
		);
		//Converts the array to a JSON string
		return json_encode($json);
	}
?>
