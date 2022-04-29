function m1() {
    console.log('-- m1 fn called --');
    return 1;
}

function m2() {
    console.log('-- m2 fn called --');
}
// true : !0, !"", true, 객체, 배열
// false : 0, "", false, undefined, ull
if(m1() && m2()) {
    console.log('이것은 true일까 false일까');
}
if(m1() || m2()) {
    console.log('이것은 true일까 false일까');
}