<?php
    //객체(함수O)와 배열(함수X)의 차이점 1 : 메소드-함수,동적
    //객체(접근지시어O)와 배열(접근지시어X)의 차이점 2 : 접근지시어 유무
    //따라서, 객체가 배열보다 유연하다

    //클래스는 변수명을 대문자로 시작(암묵적인 약속)
    //public : 접근제어자, 접근지시어(Access Modifier)
    //java : private, default, protected, public (4개)
    //php : private(클래스안에서만 사용가능), protected(같은파일, 상속받은경우, 네임스페이스인경우), public(완전오픈) (3개)
    class Student {
        public $studentId;
        public $studentName;

        //책의 방식
        public function printStudent($id, $name) {
            print "ID : {$id}<br>";
            print "Name : {$name}<br>";
        }
        
        //2번쨰 방법
        // public function printStudent() {
        //     print "ID : {$this->studentId}<br>";
        //     print "Name : {$this->studentName}<br>";
        // }
    }

    //객체 생성
    $obj = new Student;
    //객체의 속성값 입력
    $obj->studentId = 20171234;
    $obj->studentName = "Alice";

    //클래스의 함수호출
    $obj->printStudent($obj->studentId, $obj->studentName);
    
    // 2번째 방법 호출법
    // $obj->printStudent();