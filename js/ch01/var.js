//변수 할당 방식 : val, let, const
var n1;     //호이스팅 O
var nn2 = 20;
n1 = 30;
var nn3 = n1 + nn2;

console.log('nn3 : ' + nn3);    //문자열 연결은 '+'로
console.log('10' + 10);         //문자열 + 정수는 ->자동형변환되어 문자열로 출력
console.log('10' - 10);         //'-'은 문자열을 정수로 변환
console.log('10' * 10); 
console.log(10 + 10 + '10');    //같은 연산자는 왼쪽부터 계산
console.log('10' + 10 + 10);
console.log(10 + 10 * '10');    //우선순위가 있는 연산자는 먼저 계산

//ex6용 변수 할당
let n2;         //호이스팅 X (변수)
n2 = 10;
const N3 = 10;  //호이스팅 X (상수)
//  N3 = 20;    상수라 변경하면 에러