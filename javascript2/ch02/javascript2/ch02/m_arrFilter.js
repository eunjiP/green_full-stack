const arr = [11, 22, 33, 44, 55, 66, 77, 88, 99];
//filter를 활용하여 짝수만 담겨져있는 배열 arr2를 만드시오.
const arr2 = arr.filter(item => {
    return item % 2 === 0;
});
console.log(arr2);

