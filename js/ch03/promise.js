var num = 11;
//resolve, reject 모두 함수
var p1 = new Promise(function(resolve, reject) {
    if(num >= 10){
        resolve(1);
    }else {
        reject(2);
    }
});

//resolve가 실행
p1.then(function(result) {
    console.log('then : ' + result);
}).catch(function(result) {     //reject가 실행
    console.log('catch : ' + result);
})