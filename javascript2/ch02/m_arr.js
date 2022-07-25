const arr = [11, 22, 33, 44, 55, 66, 77, 88, 99];

let odd = 0, even = 0;

//forEach문을 활용하여 arr의 홀수는 odd에 전부 더하고, 짝수는 even에 전부 더하시오.
arr.forEach(item => {
    if(item % 2 === 0) {
        even += item;
    } else {
        odd += item;
    }
});

console.log(`홀수 : ${odd}`);
console.log(`짝수 : ${even}`);
