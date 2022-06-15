<?php
    //오버라이딩을 사용하는 목정 : 바꿔서 사용하기 편하게 하기 위함(느슨한 연결 구조)
    //디비 변경시 주로 사용
    class Animal {
        function crying() {
            print "동물이 운다. <br>";
        }
    }

    class Dog extends Animal {
        function crying() {
            print "강아지가 멍멍. <br>";
        }
    }

    class Shiba extends Dog {
        // function crying() {
        //     print "시바가 왕왕. <br>";
        // }
    }

    class Cat extends Animal {
        function crying() {
            print "고양이가 야옹~<br>";
        }
    }
    class Human {
        function speak() {
            print "사람이 말하다!!";
        }
    }

    function docry($ani) {
        //method_exists(객체, 함수명) : 클래스안에 특정 함수가 있는지 확인
        if(method_exists($ani, "crying")) {
            $ani->crying();
        } else {
            print "crying 메소드 없음!";
        }
    }

    //객체 생성 후 함수 호출
    $cat = new Cat;
    $shiba = new Shiba;
    docry($cat);
    docry($shiba);  //시바객체 안에 함수가 없으면 상속받은 부모클래스로 올라가서 함수를 찾고 호출한다
    //함수호출과 동시에 객체생성
    docry(new Dog);

    docry(new Human);