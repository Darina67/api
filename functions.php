<?php

function getStudents($conn) {

    $sql = "SELECT * FROM `students`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    $studentsList = [];
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $studentsList[] = $row;
    }
    echo json_encode($studentsList);
   
}

function getStudent($conn, $id){
     $sql = "SELECT * FROM `students` WHERE `id` = :id";
     $stmt = $conn->prepare($sql);
     $stmt->bindParam('id', $id, PDO::PARAM_INT);
     $stmt->execute();

     if($stmt->rowCount() === 0){
        http_response_code(404);
        $res = [
            "status" => false,
            "message" => "Студент не найден"
        ];
        echo json_encode($res);
     }
     else{
     $res = $stmt->fetch(PDO::FETCH_ASSOC);
     echo json_encode($res);
     }
    }

    function addStudent($conn, $data){
        $name = $data['name'];
        $course = $data['course'];
        $email = $data['email'];
        $phone = $data['phone'];
        $created_at = $data['created_at'];
        $updated_at = $data['updated_at'];
        $sql = "INSERT INTO `students` (`name`, `course`, `email`, `phone`, `created_at`, `updated_at`) 
        VALUES (:name, :course, :email, :phone, :created_at, :updated_at)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':course', $course, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_INT);
        $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);
        $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);


        $stmt->execute();
        if($stmt->rowCount() === 0){
            http_response_code(404);
            $res = [
                "status" => false,
                "message" => "Студент не найден"
            ];
            echo json_encode($res);
         }
         else{
        http_response_code(201);
        $res = [
            "status" => true,
            "id_студента" => $conn->lastInsertId(),
        ];
        echo json_encode($res);
    }
    }
    function updateStudent($conn, $id,  $data) {

    }