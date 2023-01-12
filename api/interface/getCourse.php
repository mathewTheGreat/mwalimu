<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/mwalimu/api/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/mwalimu/API/class/course.php';

    $database = new MwalimuDatabase();
    $pdo = $database->getPDO();
    $course = new Course($pdo);
    $data = $course->find($id);

    if($data) {
        http_response_code(200);
        echo json_encode($course);
    }else {
        http_response_code(400);
        echo "No course found matching the supplied id";
    }
?>