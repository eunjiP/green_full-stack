<?php
    class Calc {
        function sum($n1, $n2) {
            return $n1 + $n2;
        }
    }

    //미션)Calc를 객체화 변수명은 c
    //sum메소드를 호출. 5, 10을 더한 값을 리턴받고 화면에 출력하시오

    $c = new Calc;
    $result = $c->sum(5, 10);
    print "결과 : {$result} <br>";

    //static : 메모리에 먼저 올라간다(굳이 메모리에 올릴필요 없이 호출해서 사용가능)
    class StaticCalc {
        static function sum($n1, $n2) {
            return $n1 + $n2;
        }
    }

    //객체화할 필요없이 바로 호출가능(클래스명::함수명 - '->'가 아니라는 점 기억!)
    $result2 = StaticCalc::sum(10, 11);
    print "결과 : {$result2} <br>";