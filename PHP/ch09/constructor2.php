<?php
//용어정리
//멤버필드 : 멤버상수 + 멤버변수
//멤버메소드 : 클래스안의 함수
//클래스 : 설계도 개념 =>멤버필드와 멤버메소드로 구성(둘가지가 필수는 아님) 
//객체, 인스턴스 : 같은 개념이라고 생각해도 무관
//프로퍼티 : 속성(=멤버필드)

    class Fruit { 
        private $name;
        private $color;
        private $price;
        
        //오버라이딩 : 생성할때 매개변수를 정확히 정하지않고 변수를 자유롭게 넣고 싶을때
        //아래 내용이 자동적으로 들어간다
        function __construct() {
            return $this;
        }

        public function print_fruit() {
            print "Name : {$this->name}<br>";
            print "Color : {$this->color}<br>";
            print "Price : {$this->price}<br>";
        }

        public function setName($name) {
                $this->name = $name;
                return $this;
        }

        public function setColor($color) {
                $this->color = $color;
                return $this;
        }

        public function setPrice($price) {
                $this->price = $price;
                return $this;
        }
    }

    //기본생성자인 경우 클래스명에 괄호를 줘도 되고 안줘도 된다
    $apple1 = (new Fruit)->setName('사과');
    $apple1->print_fruit();

    //빌드 패턴
    $apple2 = (new Fruit)
                ->setColor("파란")
                ->setPrice(1000);
    $apple2->print_fruit();

    $banana1 = new Fruit;
    //현한 방식으로 사용 가능
    //1)
    // $banana1->setColor("노란색")->setName("바나나");
    //2)
    $banana1->setColor("노란색");
    $banana1->setName("바나나");
    $banana1->print_fruit();