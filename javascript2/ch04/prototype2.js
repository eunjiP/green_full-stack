function Person() {

    this.multi = function multi(n1, n2) {
        console.log(`${n1} * ${n2} = ${n1 + n2}`);
    }
    //객체지향언어의 오버라이딩과 비슷한 개념
    this.sum = function(n1, n2) {
        console.log(`${n1} 더하기 ${n2} 는 ${n1 + n2}`);
    }
}

Person.prototype.sum = function(n1, n2) {
    console.log(`${n1} + ${n2} = ${n1 + n2}`);
}

const p1 = new Person();

p1.multi(2, 5);
//자식 객체에 있어도 부모 객체의 함수가 생성함
p1.sum(2, 5);
//자식 객체의 함수를 활용하기를 원하면 __proto__를 추가해서 함수호출해야함
p1.__proto__.sum(10, 20);

console.log(p1);