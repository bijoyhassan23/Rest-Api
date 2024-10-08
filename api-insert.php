<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

if(is_array($data) && isset($data['name']) && isset($data['age']) && isset($data['city'])){
    include_once("config.php");
    $sql = "INSERT INTO students(student_name, age, city) 
    VALUES ('{$data['name']}', {$data['age']} , '{$data['city']}')";

    if(mysqli_query($conn, $sql)){
        echo json_encode(["message" => "Record Inserted", "status" => true]);
    }else{
        echo json_encode(["message" => "Error with query", "status" => false]);
    }
}else{
    echo json_encode(["message" => "Student Information require", "status" => false]);
}

?>


