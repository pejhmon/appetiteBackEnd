<?php require_once 'dbconnection.php'; ?>

<?php

	// Encodes data from a POST request
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);

    //Uses said POST data
    $table = $request->tableName;

    //Connects to the database and runs the query
    $sql = "SELECT * FROM " . $table
    $result = sqlsrv_query($sql, $conn);

    //Saves the retrieved data as an array
    $json = array();
    while($row = sqlsrv_fetch_array($result))     
    {
        $json[]= array(
            'name' => $row['name'],
            'password' => $row['password']
        );
    }

    //Converts the array to a JSON string
    $jsonstring = json_encode($json);
    echo $jsonstring;

?>