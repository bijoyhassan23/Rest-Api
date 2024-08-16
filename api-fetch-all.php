<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include_once("config.php");
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql) or die("SQL Query Faild");


if(mysqli_num_rows($result) > 0){
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output );
}else{
    echo json_encode(["message" => "No Record Found", "status" => false]);
}