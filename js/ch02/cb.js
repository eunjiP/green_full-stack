function sum(n1, n2) {
    return n1 + n2;     //결과값은 정수 NaN
}

function sum(n1, n2) {
    console.log(1111);
}

var ddd = sum;      //함수를 만들기 전에 내용을 넣더라도 주소값을 저장하기 때문에 2222로 변경됨

function sum(n1, n2) {
    console.log(2222);
}

console.log(sum());
      //객체가 함수를 담았다(주소값을 복사한다 생각하면됨)

console.log(ddd(10, 20));   //ddd(10, 20)은 리턴값이 없어서 undefined