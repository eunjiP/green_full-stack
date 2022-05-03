function repeat(n) {
    for (let i = 0; i < n; i++) {
        console.log(i);
    }
}

repeat(5);

function repeat2(n) {
    for (let i = 0; i < n; i++) {
        if (i % 2) {console.log(i);}    //홀수만 출력
    }
}
repeat2(5);