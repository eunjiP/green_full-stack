//calc(함수, 변수, 변수) : 함수를 불러와서 함수결과값이 리턴하는 값을 리턴할꺼야
function calc(cb, n1, n2) {
    return cb(n1, n2);
}

function fnSum(n1, n2) {
    return n1 + n2;
}

function fnMulti(n1, n2) {
    return n1 * n2;
}

const result = calc(fnSum, 10, 20); //fnSum의 주소값을 전달
console.log('result : ' + result);

const result2 = calc(fnMulti, 10, 20);
console.log('result : ' + result2);