<?php
    class StudentDAO {
        private $students = array(); // mảng để lưu trữ danh sách sinh viên
    
        // phương thức thêm sinh viên
        public function create($student) {
            $this->students[] = $student;
        }
    
        // phương thức lấy danh sách sinh viên
        public function getAll() {
            return $this->students;
        }
    
        // phương thức lấy sinh viên theo ID
        public function read($id) {
            foreach ($this->students as $student) {
                if ($student->id == $id) {
                    return $student;
                }
            }
            return null;
        }
    
        // phương thức cập nhật thông tin sinh viên
        public function update($student) {
            foreach ($this->students as &$s) {
                if ($s->id == $student->id) {
                    $s = $student;
                    return true;
                }
            }
            return false;
        }
    
        // phương thức xóa sinh viên
        public function delete($id) {
            foreach ($this->students as $key => $student) {
                if ($student->id == $id) {
                    unset($this->students[$key]);
                    return true;
                }
            }
            return false;
        }
    }
    
?>