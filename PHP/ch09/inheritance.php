<?php
    class People{
        // protected : 상속관계에서는 사용가능, 밖에서는 불가능
        protected $name;
        protected $age;

        function printPeople() {
            print "Name : {$this->name}<br>";
            print "age : {$this->age}<br>";
        }
    }

    //자식 클래스 extends 부모 클래스 : 상속받는다
    //상속하면 소스 절약이 가능하며 위로 갈수록 추상적이고 밑으로 갈수록 상세하다
    //다중 상속 불가
    class Student extends People {
        private $studentId;

        function __construct($name, $age, $studentId){
            print "나는 Student요. <br>";
            $this->name = $name;
            $this->age = $age;
            $this->studentId = $studentId;
        }

        function printStudent() {
            print "- Student - <br>";

            $this->printPeople();
            // parent::printPeople();
            print "Id : {$this->studentId}<br>";
        }

        //오버라이딩 : 부모꺼를 쓰지 않고 재정의하겠다 (부모의 printPeople함수를 재정의)
        //오버라이딩이 없으면 두개의 결과 동일
        //parent::printPeople(); : 부모꺼를 적용하겠다. , 
        //$this->printPeople(); : 내가 재정의한 함수를 사용하겠다(오버라이딩한 함수 사용)
        function printPeople()
        {
            print "Student에 있는 print People<br>";
        }
    }

    //Student객체를 생성하면 People객체 먼저 메모리에 저장하고 Student객체를 메모리에 저장한다(php는 주소를 연결하는게 아닌듯...)
    $stu1 = new Student("홍길동", 21, 1010);
    $stu1->printPeople();
    print "=============<br>";
    $stu1->printStudent();
