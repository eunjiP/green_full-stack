const set = new Set();
console.log(set);

const set1 = new Set([1, 2, 3, 3]);
console.log(set1);

const set2 = new Set('hello');
console.log(set2);  //중복되는 'l'이 제거

const uniq = array => [... new Set(array)];
console.log(uniq([2, 1, 2, 3, 4, 3, 4]));