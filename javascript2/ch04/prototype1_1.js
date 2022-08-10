//함수를 정의만 하더라도 Person의 프로토타입 객체가 생성됨
function Person() {};
const Car = function() {};

console.log(Person);
console.log(Car);

//p1은 객체를 생성(객체가 담긴다)
const p1 = new Person();
//p2는 단순이 함수의 호출(return이 없음으로 호출하여 결과값을 담아도 빈값)
const p2 = Person();

console.log(p1);
console.log(p2);