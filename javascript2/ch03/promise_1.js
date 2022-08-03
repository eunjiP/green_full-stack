//비동기를 제어하는 방법
//프라미스는 프라미스를 반환한다
const p1 = new Promise((resolve, reject) => {
    // resolve(300);    
        //=> then이 실행
    // reject(200);
        //=> catch가 실행
    if(true) {
        resolve(100);
    } else {
        reject('왜 실패했는가');
    }
});

p1
.then(res => {
    console.log('나는 then ' + res);
    // return "aaa";
    return new Promise((resolve, reject) => {
        resolve("aaa");
    })
})
.then(res => {
    console.log('두번째 then ' + res);
})
.catch(err => {
    console.log('나는 catch ' + err);
})


