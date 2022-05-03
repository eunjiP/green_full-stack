const map = new Map();

const lee = { name: 'Lee'};
const kim = { name: 'Kim'};

map 
    .set(lee, 'developer')
    .set(kim, 'designer');

console.log(map.get(lee));
console.log(map.get(kim));
console.log(map.get('key'));    //정의한적 없는 키 값을 입력시에 undefined
