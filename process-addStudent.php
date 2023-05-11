<?php
    include 'studentDAO.php';
    include 'student.php';
    $dao = new StudentDAO();
    // $student = new Student();
    if(isset($_POST['txtId'])){
        $id = $_POST['txtId'];
    }
    if(isset($_POST['txtName'])){
        $name = $_POST['txtName'];
    }
    $age = $_POST['txtAge'];
    $grade = $_POST['txtGrade'];

    // Mở tệp trong chế độ ghi (append mode)
    $file = fopen("db_dshs.txt", "a");

    $newStudent = new Student($id, $name, $age, $grade);
    $dao -> create($newStudent);
    if ($file) {
        // Ghi dòng mới vào tệp
        fwrite($file, $newStudent->id . ',' . $newStudent->name . ',' . $newStudent->age . ',' . $newStudent->grade . "\n");

        // Đóng tệp sau khi ghi xong
        fclose($file);
        header("location: admin.php");
    } else {
        echo "Không thể mở file!";
    }
?>