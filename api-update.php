<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

if(is_array($data) && isset($data['sid']) && isset($data['name']) && isset($data['age']) && isset($data['city'])){
    include_once("config.php");
    $sql = "UPDATE students
    SET
    student_name = '{$data['name']}',
    age = {$data['age']},
    city = '{$data['city']}' 
    WHERE id = {$data['sid']}";

    if(mysqli_query($conn, $sql)){
        echo json_encode(["message" => "Record Updated", "status" => true]);
    }else{
        echo json_encode(["message" => "Error with query", "status" => false]);
    }
}else{
    echo json_encode(["message" => "Student Information require", "status" => false]);
}

?>