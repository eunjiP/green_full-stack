[1, 2, 3].forEach(num => {
    imCallbackFn(() => {
        console.log(num);
    })
})

function imCallbackFn(cb) {
    const start = Date.now();
    now  = start;
    while(now - start < 3000) {
        now = Date.now()
    }
    cb()
}