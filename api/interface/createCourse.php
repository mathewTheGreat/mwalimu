<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once $_SERVER['DOCUMENT_ROOT'].'/mwalimu/api/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/mwalimu/API/class/course.php';
    
    
    $database = new DairyDatabase();
    $pdo = $database->getPDO();
    $course = new Course($pdo);
    $course->title = $_POST['title'];
    $course->description = $course['description'];
    $course->syllabus = $course['syllabus'];
    $course->prerequisites = $course['prerequisites'];
    $course->length = $course['length'];
    $course->audience = $course['audience'];
    $course->image = $course['image'];
    $course->lectures = $course['lectures'];
    $course->quizzes = $course['quizzes'];
    $course->assignments = $course['assignments'];
    $course->schedule = $course['schedule'];
    $course->price = $course['price'];
    $course->instructor_id = $course['instructor_id'];
    $course->rating = $course['rating'];
    $course->enrollment = $course['enrollment'];
    $saved = $course->create();
    if ($saved) {
        echo "Course was saved successfully";
    } else {
        echo "An error occurred while saving the course";
    }
?>