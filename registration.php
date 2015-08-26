<?php require_once 'dbconnection.php'; ?>
<?php include 'functions/shared_functions.php'; ?>

<?php
	header("Access-Control-Allow-Origin: *");

    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);

	$group = $request->group;
//    $password = sqlsrv_escape_string($request->password);
//    $nhsnumber = sqlsrv_escape_string($request->nhsnumber);
	$password = $request->password;
	$nhsnumber = $request->nhsnumber;
	$dateofbirth = $request->dateofbirth;
	$gender = $request->gender;
    $activitylevel = $request->activitylevel;


    $sql = "SELECT * FROM users WHERE nhsnumber = '" . $nhsnumber . "'";
    $nhsnumbercheck = sqlsrv_query($conn, $sql) or die("Error: Query to check if nhsnumber exists failed");

    if(!null == (sqlsrv_fetch_array($usernameCheck))){
        echo "failure";
    }else{            
        /// Hash and salt the password
        $password = sha1('vq3%jt'.$password.'s1*v'); 
        
        ///Process the query then redirect if successful
        $query = "INSERT INTO users (group, password, nhsnumber, dateofbirth, gender, activitylevel) ";
        $query .= "VALUES ('{$group}', '{$password}', '{$nhsnumber}', '{$dateofbirth}', '{$gender}', '{$activitylevel}')";
        $result = sqlsrv_query($conn, $query) or die ('Error: Query to insert new user failed. Query: ' . $query);
        
        echo "success";
    }
?>
