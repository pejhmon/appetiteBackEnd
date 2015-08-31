<?php include 'functions/shared_functions.php'; ?>

<?php
    header("Access-Control-Allow-Origin: *");
    session_start();
    // Encodes data from a POST request
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    //Uses said POST data
    $check = $request->check;
    
    if ($check == "id"){
        if (!isset($_SESSION['id'])){
            die(errorparse("failure"));
        }else{
            die(errorparse($_SESSION['id']));
        }
    }
?>
