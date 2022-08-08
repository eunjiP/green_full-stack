function fn() {
    new Promise((resolve, reject) => {
        console.log('하나');
        console.log(aaa);
        resolve();
    })
    .then(() => {
        return new Promise((resolve, reject) => {
            setTimeout(() => {
                console.log('둘');
                resolve();
            }, 0);
        });
    })
    .catch(err => {
        console.log('1번 에러 발생');
    })
    .then(() => {
        console.log('셋');
        console.log(aaa);
    }, () => {
        //then후에 함수를 한개 더 적으면 위의 catch에 에러 발생시 작동
        console.log('1-2사이 에러 발생!!');
    })
    .catch((err) => {
        console.log('2번 에러 발생');
    })
    //무조건 실행되는 문장(finally와 비슷함)
    .then(() => {
        console.log('마무리');
    })
}

fn();