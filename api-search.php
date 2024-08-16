<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"), true);

if($data && isset($data['search'])){
    include_once("config.php");
    $search = mysqli_real_escape_string($conn, $data['search']);

    $sql = "SELECT * FROM students WHERE student_name LIKE '%{$search}%'";
    $result = mysqli_query($conn, $sql) or die("SQL Query Faild");

    if(mysqli_num_rows($result) > 0){
        $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($output);
    }else{
        echo json_encode(["message" => "No Record Found", "status" => false]);
    }
}else{
    echo json_encode(["message" => "Student ID is required", "status" => false]);
}

