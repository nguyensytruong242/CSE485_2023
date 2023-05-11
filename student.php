<?php
    class Student {
        public $id;
        public $name;
        public $age;
        public $grade;
      
        // constructor
        function __construct($id, $name, $age, $grade) {
          $this->id = $id;
          $this->name = $name;
          $this->age = $age;
          $this->grade = $grade;
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
        public function getGrade() {
          return $this->grade;
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
        public function setGrade($grade) {
          $this->age = $grade;
        }
      }
      
?> 