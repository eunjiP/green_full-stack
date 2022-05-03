const map = new Map();
console.log(map);

const map1 = new Map([['key1', 'value1'], ['key2', 'value2']]);
console.log(map1);

const { size } = new Map([['key1', 'value1'], ['key2', 'value2']]);
console.log(size);

const map2 = new Map([['key1', 'value1'], ['key1', 'value2']]);
console.log(map2);      //같은 키는 같은 값으로 취급되어 덮어쓰기된다.

