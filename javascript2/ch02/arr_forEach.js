const arr = [10, 20, 30, 40, 50, 60, 70, 80, 90];

/*
console.log('arr[0] : ' + arr[0]);
//값 변경은 대입연산자만 가능
arr[0] = 11;
arr[0]++;
console.log('arr[0] : ' + arr[0]);
*/

for (let i = 0; i < arr.length; i++) {
    console.log(arr[i]);
}
console.log('----------------');

// arr.forEach(콜백함수)
// 괄호는 아규먼트가 1개일때만 생략 가능함
arr.forEach(item => {
    console.log('값 : ' + item);
});

