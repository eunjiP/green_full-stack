function Person(name) {
    this.name = name || '혁수';

    this.myself = function() {
        console.log(`나는 ${this.name}입니다.`);
    }
}

Person.prototype.getName = function() {
    return this.name;
    // this은 나 자신의 주소값으로 부모로 함수가 올라 갔다 하더라도 자기자신을 지칭함
    // return this.__proto__.name;
}

function Korean(name) {
    this.name = name;
}

//Korean프로토타입의 객체를 Person객체로 변경함
Korean.prototype = new Person('찬호');  //k2에 에러 발생안함
//원래는 Korean프로토타입 객체를 가리키지만 위에서 Person객체로 변경하였음으로 k1또한 Person객체를 가리키게 된다
const k1 = new Korean('민수');

//k1의 __proto__ 는 Korean프로토타입이지만 Person으로 k1만 변경 한것과 같음으로 k1은 myself를 할때 에러가 발생하지 않지만 k2를 생성할때는 Korean프로토타입을 가리키고 있음으로 Person 까지 가지 못하고 에러가 발생한다
// k1.__proto__ = new Person('찬호');   //k2에서 에러 발생


console.log(k1.getName());
k1.myself();
// console.log(k1.name);  //민수
// console.log(k1.__proto__.name);  //찬호

const k2 = new Korean('철수');
k2.myself();    
//에러 발생