var arr = [2, 6, 10, 11, 22, 1, 7];
var sum = 0;
for(var i=0; i<arr.length; i++) {
    sum += arr[i];
}
console.log(`sum : ${sum}`);    //변수 값 문자열안에 넣기 백틱?

var evensum = 0;
//콜백형 배열함수
//인자는 1개로 함수를 배열에 값의 수만큼 호출
//순서 : 값, 인덱스값, 베열전체
arr.forEach(function(item, index, arr) {
    if(index < 2) {
        console.log(`item : ${item}, ${arr}`);
    }
});
