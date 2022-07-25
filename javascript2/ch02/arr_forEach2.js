const arr = [10, 20, 30, 40, 50, 60, 70, 80, 90];

// 밑에 내용이 forEach가 하는 일을 풀어서 작성
// forEach문 안에는 continue를 사용 없음 => 사용하야한다면 for문 사용해야함
const fnPrint = item => {
    console.log('값 : ' + item);
};
for (let i = 0; i < arr.length; i++) {
    fnPrint(arr[i]);
}