function repeat(n, f) {
    for (let i = 0; i < n; i++) {
        f(i);       //함수 안에 함수를 호출
    }
}

var logAll = function (i) {
    console.log(i);
}

repeat(5, logAll);

var logOdds = function (i) {
    if (i % 2) { console.log(i); }
}

repeat(5, logOdds);

repeat(5, function (i) {
    if (i % 2 === 0) { console.log(i); }
});