<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/mwalimu/api/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/mwalimu/API/class/course.php';
    
    $database = new MwalimuDatabase();
    $pdo = $database->getPDO();
    
    $allCourses = Course::getAll($pdo);
    http_response_code(200);
    echo json_encode($allCourses);
?>