<?php

require_once __DIR__.'/router.php';

get('/Mwalimu/course', 'api/interface/getAllCourses.php');
get('/Mwalimu/course/$id', 'api/interface/getCourse.php');
post('/Mwalimu/course', 'Dairy_API/api/createCattle.php');
post('/Mwalimu/course/$id', 'Dairy_API/api/updateCattle.php');
delete('/Mwalimu/course/$id', 'Dairy_API/api/deleteCattle.php');
any('/404','views/404.php');