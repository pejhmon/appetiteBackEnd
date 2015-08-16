<?php require_once 'dbconnection.php'; ?>
<?php include 'functions/pull_all_functions.php'; ?>

<?php
//	header("Access-Control-Allow-Origin: *");
	// Encodes data from a POST request
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);

    //Uses said POST data
    $table = $request->table;
    $type = $request->type;
    $userID = $request->userID;

    $where = "";
    $select = "SELECT *";
    $order = ";";
    
    // Check if there are any other conditions
    switch ($type) {
        case "all":
            $where = "";
            break;
        case "recent": 
            $select = "SELECT TOP 1 *";
            $order = " ORDER BY datetime DESC;";
            break;
        case "first": 
            $select = "SELECT TOP 1 *";
            $order = " ORDER BY datetime ASC;";
            break;
        case "today":
            $where = " WHERE DateDiff(d, datetime, SYSDATETIME())=0";
            break;
        default:
            echo "error";
    }

    // Check if needs to be filtered by userID
    if ($userID != "") {
        if ($where === "") {
            $where = " WHERE userid = '" . $userID . "'";
        }else{
            $where .= " AND userid = '" . $userID . "'";
        }
    }

    $sql = $select . " FROM " . $table . $where . $order;
    $result = sqlsrv_query($sql, $conn);

    switch ($table) {
        case "foodlist":
            echo foodlist($result);
            break;
        case "userfoodlist":
            echo userfoodlist($result);
            break;
        case "usermeallist":
            echo usermeallist($result);
            break;
        case "userweightmanifest":
            echo userweightmanifest($result);
            break;
        case "userfoodmanifest":
            echo userfoodmanifest($result);
            break;
        case "userrequirementsmanifest":
            echo userrequirementsmanifest($result);
            break;
        case "symptomslist":
            echo symptomslist($result);
            break;
        case "usersymptomlist":
            echo usersymptomlist($result);
            break;
        default:
            echo "error";
    }
?>
