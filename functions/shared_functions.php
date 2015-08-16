<?php
	function sqlsrv_escape_string($string)
	{
	    if (get_magic_quotes_gpc()) {
	        $string = stripslashes($string);
	    }
	    return str_replace("'", "''", $string);
	}
?>