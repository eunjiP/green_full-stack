//map의 요소 추가는 set()사용
const map = new Map();
console.log(map);

map.set('key1', 'value1');
console.log(map);

map
    .set('key2', 'value2')
    .set('key3', 'value3');     //여러 값을 추가 가능
console.log(map);