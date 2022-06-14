<?php
    
    class Student {
        private $studentId;
        private $studentName;

        //getters : 클래스의 값을 가지고 올때(은닉화 되어 있기 때문에 getter사용)
        //PHP Getters&Setters설치시에 만들고 싶은 변수에 우클릭 시에 자동생성 가능
        public function getStudentId(){
            return $this->studentId;
        }
        public function getStudentName() {
            return $this->studentName;
        }
        //setters : 클래스의 값을 변경할때(은닉화 되어 있어서 setter사용해서 변경가능)
        public function setStudentId($studentId) {
            $this->studentId = $studentId;
            return $this;
        }
        public function setStudentName($studentName) {
            $this->studentName = $studentName;
            return $this;
        }

        
        public function printStudent() {
            print "ID : {$this->studentId}<br>";
            print "Name : {$this->studentName}<br>";
        }

    }

    $obj = new Student;
    print "1번째 : " . $obj->setStudentId(1211)->getStudentId() . "<br>";
    $obj->setStudentName("신사임당");

    $obj2 = new Student;
    print $obj2->setStudentId(8888)->getStudentId() . "<br>";
    print "2번째 : " . $obj->getStudentId() . "<br>";

    // $obj->printStudent();
