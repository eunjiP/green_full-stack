function fn1() {
    return new Promise(function(resolve) {
        setTimeout(function() {
            resolve(10);
        }, 2000);
    });
}

function fn2(val) {
    return new Promise(function(resolve) {
        setTimeout(function() {
            resolve(val + val);
        }, 1000);
    });
}

//promise 지옥
// p1.then(function(result) {
//     console.log(result);
//         var p2 = fn2(result);
//         p2.then(function(result2) {
//             console.log('result2 : ' + result2);
//     });
// };


var p1 = fn1();
//fn의 resolve의 결과 실행
p1.then(function(result) {
    return result;
})
.then(function(result) {
    return fn2(result);
})
.then(function(result) {
    console.log('result : ' + result);
})
