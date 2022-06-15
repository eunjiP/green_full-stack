<?php
    class Fruit {
        //private 멤버필드에서 값을 설정하는 방법 2가지
        //1)생성자로 2)setter
        //private 멤버필드에서 값을 빼오는 방법 1가지
        // Getter
        //class에 생성자와 getter민 있는 경우(setter 없음) => 수정불가(이럴꺼면 상수로 쓰는게 용이함)
        private $name;
        private $color;
        private $price;
        
        //__construct : 생성자 (멤버함수는 모두 자동으로 public이 붙는다)
        //$color="초깃값" : 초깃값 지정가능 => 유연하게 사용가능
        function __construct($name=null, $color=null, $price=null) {
            $this->name = $name;
            $this->color = $color;
            $this->price = $price;
        }

        public function print_fruit() {
            print "Name : {$this->name}<br>";
            print "Color : {$this->color}<br>";
            print "Price : {$this->price}<br>";
        }
    }

    $apple = new Fruit("Apple", "red", 1000);
    $banana = new Fruit("Banana", "yellow", 500);
    $banana2 = new Fruit("", "yellow"); //칸만 맞춰주면 위치만 맞으면 객체 생성 가능
    
    $apple->print_fruit();
    $banana->print_fruit();
    $banana2->print_fruit();