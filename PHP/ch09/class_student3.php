<?php
    //private : 은닉화, 캡슐화
    //public : 함수만 가능(변경 불가하니깐)
    class Student {
        private $studentId;
        private $studentName;

        //책의 방식
        public function printStudent($id, $name) {
            print "ID : {$id}<br>";
            print "Name : {$name}<br>";
        }
    }

    $obj = new Student;
    //private 에 접근하려고 하면 에러 발생(중간에 에러발생 시에 아래내용도 실행안됨)
    //클래스의 함수호출
    $obj->printStudent(12122, "홍길동");
    
    // 2번째 방법 호출법
    // $obj->printStudent();