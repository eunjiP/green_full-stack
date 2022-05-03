const set = new Set([1, 2, 3]);

//forEach(요소값, 요소값, set객체 자체)
set.forEach((v, v2, set) => console.log(v, v2, set));


const set1 = new Set([1, 2, 3]);

//Set객체는 set.prototype의 Symbol.iterator 메소드를 상속받는 이터레이블이다.
console.log(Symbol.iterator in set1);

for (const value of set) {
    console.log(value);
}

console.log(set1);      //Set(3) { 1, 2, 3 }
console.log([...set1]); //[ 1, 2, 3 ]

const [a, ...rest] = set;   //디스트럭처링 할당의 대상이 될 수 있다.
console.log(a, rest);