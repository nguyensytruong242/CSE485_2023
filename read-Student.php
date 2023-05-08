<?php
        $filename = 'db_dshs.txt';
        $data = array();

        if (($handle = fopen($filename, 'r')) !== FALSE) {
            $header = fgets($handle);
            // Đọc lần lượt từng dòng của file
            while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
                // Lưu dòng đọc được vào một mảng lớn
                $data[] = $row;
            }

            fclose($handle);
        }

        print_r($data);

    class Course {
        private $students;
        private $studentDAO;
        public function __construct() {
            // Khởi tạo danh sách sinh viên và đối tượng StudentDAO
            $this->students = array($data);
            $this->studentDAO = new StudentDAO();
        }
    
        public function findStudentById($id) {
            // Sử dụng phương thức findStudentById trong StudentDAO để tìm kiếm sinh viên theo id
            return $this->studentDAO->read($this->students, $id);
        }
    }
    

?>