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

    $sql = "SELECT * FROM users WHERE nhsnumber = '{$nhsnumber}' AND password = '{$password}'";
    $result = sqlsrv_query($conn, $sql) or die(errorparse("Error: query to check if login details are correct failed"));

    if(!null == (sqlsrv_fetch_array($result))){
        
        echo "success. ID = ";
        while($row = sqlsrv_fetch_array($result)){
            foreach ($row as $columnName => $columnData) {
                echo 'Column name: ' . $columnName . ' Column data: ' . $columnData . '. ';
            }
        }
        echo ". success";
    }else{
        echo errorparse("failure");
    }
?>
