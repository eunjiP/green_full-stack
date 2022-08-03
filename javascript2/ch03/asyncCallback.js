//콜백 함수 안에 콜백 함수
//첫번째 콜백 함수 : imCallbackFn / 두번째 콜백 함수는 () => { console.log(num); }
[1, 2, 3].forEach(num => {
    imCallbackFn(() => { console.log(num); })
});

function imCallbackFn(cb) {
    const start = Date.now();
    let now = start;
    while(now - start < 3000) {
        now = Date.now();
    }
    cb();
}