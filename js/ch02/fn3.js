sum(1, 2);
sum(1, 2, 3, 4, 5, 6);
sum(1, 2, 3, 4, 5, 6, 7, 8, 9, 5, 6, 7, 4);

//arguments : 매개변수가 배열로 만들어준다.(매개변수를 정해줘도 숫자가 많아도 배열로 들어감)
//속성(소괄호없음)과 메소드(소괄호있음)는 객체와 .으로 연결(객체를 배열처럼 사용하지만 배열은 아님)
function sum() {
    // console.log(arguments.length);

    let sum = 0;
    for(var i=0; i<arguments.length; i++) {
        sum += arguments[i];
    }
    console.log('sum : ' + sum);
}

