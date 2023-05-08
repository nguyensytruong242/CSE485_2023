<?php
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

    
    if ($file) {
        // Ghi dòng mới vào tệp
        fwrite($file, "$id,$name,$age,$grade \n");

        // Đóng tệp sau khi ghi xong
        fclose($file);
        header("location: admin.php");
    } else {
        echo "Không thể mở file!";
    }
?>