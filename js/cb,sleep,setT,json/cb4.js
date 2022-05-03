var count = 0;
//순수 함수(언제나 동일한 값을 반환)
function increase(n) {
    return ++n;
}

count = increase(count);
console.log(count);

count = increase(count);
console.log(count);

//비순수함수(외부의 값을 변경해서 상태변화를 추척하기 어렵다.
var count1 = 0;
function increase1() {
    return ++count1;
}

increase1();
console.log(count1);

increase1();
console.log(count1);