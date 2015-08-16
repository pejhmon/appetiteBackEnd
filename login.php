<?php require_once 'dbconnection.php'; ?>
<?php include 'functions/shared_functions.php'; ?>

<?php
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);

    $password = sqlsrv_escape_string($request->password);
    $nhsnumber = sqlsrv_escape_string($request->nhsnumber);

    $password = sha1('vq3%jt'.$password.'s1*v');

    $sql = "SELECT * FROM users WHERE nhsnumber = '{$nhsnumber}'' AND password = '{$password}';";
    $nhsnumbercheck = sqlsrv_query($conn, $sql) or die("Error: query to check if login details are correct failed");

    if(!null == (sqlsrv_fetch_array($usernameCheck))){
        echo "failure";
    }else{            
        echo "success";
    }
?>