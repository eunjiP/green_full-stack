const arr = [11, 22, 33, 44, 55, 66, 77, 88, 99];

// arr, forEach를 활용하여 밑 내용과 똑같이 찍어주세요.
/*
arr[0] : 11
arr[1] : 22
...
arr[8] : 99
*/

arr.forEach((item, idx) => {
    console.log(`arr[${idx}] : ${item}`);
});