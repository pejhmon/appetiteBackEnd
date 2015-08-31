<?php require_once 'dbconnection.php'; ?>
<?php include 'functions/shared_functions.php'; ?>

<?php
    header("Access-Control-Allow-Origin: *");
    
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);

//    $password = sqlsrv_escape_string($request->password);
//    $nhsnumber = sqlsrv_escape_string($request->nhsnumber);
    $password = $request->password;
    $nhsnumber = $request->nhsnumber;

    $password = sha1('vq3%jt'.$password.'s1*v');

    $sql = "SELECT * FROM users WHERE nhsnumber = '". $nhsnumber . "' AND password = '" . $password . "'";
    $result = sqlsrv_query($conn, $sql) or die(errorparse("Error: query to check if login details are correct failed"));

    if(!null == (sqlsrv_fetch_array($result))){
        $query  = "SELECT * FROM users WHERE nhsnumber = '". $nhsnumber . "'";
        $result2 = sqlsrv_query($conn, $query) or die(errorparse("Query failed"));
        while($row = sqlsrv_fetch_array($result2)){
            echo errorparse($row['id']);
            session_start();
            $_SESSION['id'] = $row['id'];
        }
    }else{
        echo errorparse("failure");
    }
?>
