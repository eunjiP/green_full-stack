<?php
    class Computer {
        //모든 객체가 같은 값을 가지고 싶으면 static, 객체마다 다른 값을 가지고 싶은면 static을 붙이면 안된다.
        //저장공간은 한 곳인데 객체화 했을때 참조를 함(상속느낌과 비슷한 개념)
        
        public static $brand;
        public $price;

        function __construct() {
            //객체 생성시에 바로 값 할당되도록
            self::$brand = "2";
        }

        static function setBrand($brand) {
            self::$brand = $brand;
        }

        function myPrint() {
            //static 멤버필드는 self로 사용 가능하나 문자열 밖에 빼야함(포함되면 동작안됨)
            print "컴퓨터 브랜드는 " . self::$brand . ", 가격은 {$this->price}입니다.<br>";
        }

        //static 함수는 멤버필드도 모두 static이여야 한다. 
        // => 파라미터를 넣어서 만드는 함수는 static이 붙은 함수가 훨씬 메모리적으로 효율적임
        //(메모리에 먼저 올라가는데 객체화되어야 사용하는 변수가 있으면 에러 발생)
        // static function myStaticPrint() {
        //     print "컴퓨터 브랜드는 " . self::$brand . ", 가격은 {$this->price}입니다.<br>";
        // }
    }

    Computer::$brand = "LG";
    $c = new Computer;
    $c->myPrint();

    $c2 = new Computer;
    $c2->price = 20000;

    $c->myPrint();
    $c2->myPrint();

    Computer::$brand = "Sansung";

    $c->myPrint();
    $c2->myPrint();
    