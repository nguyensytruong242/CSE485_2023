<?php
    class Student {
        private $id;
        private $name;
        private $age;
      
        // constructor
        function __construct($id, $name, $age) {
          $this->id = $id;
          $this->name = $name;
          $this->age = $age;
        }
      
        // getters
        public function getId() {
          return $this->id;
        }
      
        public function getName() {
          return $this->name;
        }
      
        public function getAge() {
          return $this->age;
        }
      
        // setters
        public function setId($id) {
          $this->id = $id;
        }
      
        public function setName($name) {
          $this->name = $name;
        }
      
        public function setAge($age) {
          $this->age = $age;
        }
      }
      


      // mở file
        $file = file("./Student.txt");
        print_r($file)
        // // in từng dòng trong file

        // foreach($file as $line) {
        // echo $line."<br>";
        // }

        // // đóng file
        // fclose($file);

?>