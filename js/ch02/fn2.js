//매개변수에 없을 때를 대비해 초기값을 주는것
function sum(n1=1, n2=2, n3=3, n4=4) {
    console.log('sum : ' + (n1 + n2 + n3 + n4));
}

sum();
sum(10);
sum(10, 20);
sum(10, 20, 30);
sum(10, 20, 30, 40);
sum(10, 20, 30, 40, 50);

//null은 사칙연산하면 0으로 취급
function multi(n1=null, n2=1, n3=2) {
    console.log(n1 * n2 * n3);
}
multi();
multi(5);