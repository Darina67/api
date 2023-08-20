<?php

header('Content-type: json/application');
require_once "connect.php";
require_once "functions.php";


$method = $_SERVER['REQUEST_METHOD'];

$q = $_GET['q'];

$params = explode('/', $q);

$type = $params[0];
$id = $params[1];

if($method === 'GET') {

    if($type === 'students'){
        if(isset($id)){
            getStudent($conn, $id);
        }else{
            getStudents($conn);
        }
    }
}elseif ($method === 'POST'){
    if($type === 'students'){
    addStudent($conn, $_POST);
    }
}elseif ($method === 'PATCH'){
    if(isset($id)){
        $data = file_get_contents('php://input');
        $data = json_decode($data, true);
        updateStudent($conn, $id,  $data);
        $sql = "UPDATE `students` SET `name` = 'Михайлова Анна Сергеевна2', `course` = 'Прикладная математика2', `email` = 'Anya1999@mail.ru2', `phone` = '7896521', `created_at` = '2023-08-22', `updated_at` = '2023-08-22' WHERE `students`.`id` = 2"
    }
}






