<?php require_once 'dbconnection.php'; ?>

<?php
	header("Access-Control-Allow-Origin: *");
	// Encodes data from a POST request
    // $postdata = file_get_contents("php://input");
    // $request = json_decode($postdata);
    $postdata = $_POST("tableName");

    //Uses said POST data
//    $table = $request->tableName;

    //Connects to the database and runs the query
    $sql = "SELECT * FROM " . $postdata
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