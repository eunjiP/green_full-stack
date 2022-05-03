const { size } = new Set([1, 2, 3, 3]);
console.log(size);  //중복되는 값은 제외하고 길이를 구한다.

const set = new Set([1, 2, 3]);

console.log(Object.getOwnPropertyDescriptor(Set.prototype, 'size'));

set.size = 10;  
//getter만 존재하는 접근자 프로퍼티이므로 size에 숫자를 할당하여도 변경되지 않음
console.log(set.size);