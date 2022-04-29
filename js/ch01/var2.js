var n1 = 10;
var s1 = '20';
s1 = parseInt(s1);  //리터럴이 아닌 형변환으로 값변경하고 싶을때

console.log(n1 + s1);

var s2 = '20';
s2 = Number(s2);
console.log(n1 + s2);

console.log('parseInt ' + parseInt("12a34"));     //숫자만 형변환 문자열 만나면 무시
console.log('Number : ' + Number('12a34'));     //숫자가 포함이 안되어야하면 number이 좋다