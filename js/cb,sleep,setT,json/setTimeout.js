//비동기(asynchronous) : 현재 실행 중인 태스크가 종료되지않은 상태라도 다음 태스크가 곧바로 실행
//장점 : 블로킹이 발생하지않음 / 단점 : 순서가 보장되지 않음
//비동기 함수는 전통적으로 콜백 패턴을 사용 => 콜백 지옥(callback hell)을 발생
function foo() {
    console.log('foo');
}
function bar() {
    console.log('bar');
}

setTimeout(foo, 3 * 1000);  //foo함수는 일정시간 지나야 실행
bar();  //bar함수는 바로 실행