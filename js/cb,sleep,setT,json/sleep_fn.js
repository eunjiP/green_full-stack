//동기처리(synchronous) : 실행 중인 태스크가 종료할때까지 다음에 실행될 태스크가 대기하는 방식
//장점 : 순서보장 / 단점 : 앞선 태스트가 종료할때까지 뒤의 태스크는 블로킹됨
function sleep(func, delay) {
    const delayUntill = Date.now() + delay;

    while(Date.now() < delayUntill) {
        func();
    }
}

function foo() {
    console.log('foo');
}

function bar() {
    console.log('bar');
}

sleep(foo, 3 * 1000);
bar();