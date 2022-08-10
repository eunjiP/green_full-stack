//참고 블로그 : https://www.nextree.co.kr/p7323/

function Person() {}

const p1 = new Person();
console.log('-- p1(1) --');
console.log(p1);

console.dir(Person.prototype);

//서로서로 참조하고 있다고 알고 있으면 된다
console.dir(Person.prototype.constructor);
console.log(Person.prototype.constructor);

Person.prototype.sum = function(n1, n2) {
    console.log(`${n1} + ${n2} = ${n1 + n2}`);
}

//p1에 추가 하지 않아도 생성된 객체에 없는 함수면 부모 함수로 올라가서 확인 한다
console.log(p1);
p1.__proto__.sum(11, 22);

//처음 생성시에는 비어 있었는데 sum이라는 함수가 추가됨
console.dir(Person.prototype);


//static과 비슷하게 객체화 하지 않아도 호출이 가능
Person.prototype.sum(10, 20);

