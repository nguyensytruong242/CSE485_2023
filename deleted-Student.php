<?php
    include 'studentDAO.php';
    include 'student.php';
    // Lấy ID của sinh viên cần xóa từ URL
    $id = $_GET['id'];

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

    // Xóa sinh viên bằng ID sử dụng phương thức delete() của lớp StudentDAO
    $result = $dao->delete($id);

    // Lưu danh sách sinh viên vào file txt
    $file = fopen('db_dshs.txt', 'w');
    foreach ($dao->getAll() as $student) {
        fwrite($file, $student->id . ',' . $student->name . ',' . $student->age . ',' . $student->grade . "\n");
    }
    fclose($file);

    // Chuyển hướng người dùng đến trang danh sách sinh viên
    header("Location: admin.php");
    exit;
?>
