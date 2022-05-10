//객체 생성 함수는 대부분 대문자로 변수명 시작
function Human(name, age) {
    //속성
    this.name = name;
    this.age = age;

    //메소드
    this.showMe = function() {
        console.log(`My name is ${this.name}, age is ${this.age}.`);
    }
}
//객체생성 => 인스턴스
var h1 = new Human('홍길동', 20);
//객체생성 후에 메소드를 추가 할 수 있다(prototype붙은 이 메소드는 부모가 된다. Human이 변경되도 적용됨)
Human.prototype.hello = function() {
    console.log(`Hello ${this.name}`);
}
//height 속성은 h1에만 추가된 것
h1.height = 180;
var h2 = new Human('둘리', 120);

h1.showMe();
h2.showMe();

h1.hello();
h2.hello();

console.log("h1.height : " + h1.height);
console.log("h2.height : " + h2.height);