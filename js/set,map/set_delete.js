const set = new Set([1, 2, 3]);
console.log(set);

set.delete(2);
console.log(set);

set.delete(1);
console.log(set);

set.delete(0);  //앖는 값은 에러 없이 그냥 무시
console.log(set);

const set1 = new Set([1, 2, 3]);
console.log(set1);

set1.delete(2).delete(1);    //add처럼 연속적인 호출 불가(에러발생!!)
console.log(set1);