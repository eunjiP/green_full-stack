function sum(n1, n2) {
    return n1 + n2;
}

function printSum(n1, n2) {
    console.log('sum : ' + (n1 + n2));  //반환겂이 없는 함수
}

var result = sum(10, 20);
console.log('result : ' + result);

result = sum(10, 20, 30);   //매개변수 갯수로는 에러가 나지 않고 많은 건 무시
console.log('result : ' + result);

result = sum(10);       //결과) NaN -> 두번째 인자가 undefined됨
console.log('result : ' + result);

var result = printSum(100, 200);    //반환값이 없어서 변수에는 아무것도 담기지 않는다.
console.log('result : ' + result);
