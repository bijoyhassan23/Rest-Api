<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


$data = json_decode(file_get_contents("php://input"), true);

if($data && isset($data['sid'])){
    include_once("config.php");

    $sql = "DELETE FROM students WHERE id = {$data['sid']}";

    if(mysqli_query($conn, $sql)){
        echo json_encode(["message" => "Data deleted", "status" => true]);
    }else{
        echo json_encode(["message" => "No Record Found", "status" => false]);
    }
}else{
    echo json_encode(["message" => "Student ID is required", "status" => false]);
}

