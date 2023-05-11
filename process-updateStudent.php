<?php
    include 'studentDAO.php';
    include 'student.php';
    // Lấy ID của sinh viên cần xóa từ URL
    // Lấy thông tin của sinh viên cần cập nhật từ form
    if(isset($_POST['txtId'])){
        $id = $_POST['txtId'];
    }
    $name = $_POST['txtName'];
    $age = $_POST['txtAge'];
    $grade = $_POST['txtGrade'];
    // Tạo đối tượng StudentDAO
    $dao = new StudentDAO();

    // Đọc danh sách sinh viên từ file txt và thêm vào mảng students
    $file = fopen('db_dshs.txt', 'r');
    while (!feof($file)) {
        $line = fgets($file);
        if ($line != "") {
            $data = explode(',', $line);
            $student = new Student(trim($data[0]), trim($data[1]), trim($data[2]), trim($data[3]));
            $dao->create($student);
        }
    }
    fclose($file);
    // Tạo đối tượng Student để cập nhật thông tin
    $student = new Student($id, $name, $age, $grade);

    $result = $dao->update($student);
    if ($result) {
        $file = fopen('db_dshs.txt', 'w');
        foreach ($dao->getAll() as $s) {
            $line = $s->id . ',' . $s->name . ',' . $s->age . ',' . $s->grade . "\n";
            fwrite($file, $line);
        }
        fclose($file);
        header("location: admin.php");
    } else {
        echo "Cập nhật thông tin học sinh thất bại!";
    }
?>