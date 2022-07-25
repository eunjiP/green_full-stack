const arr = [11, 22, 33, 44, 55, 66, 77, 88, 99];
const result = arr.reduce((preVal, curVal) => {
    // reduce : 처음의 preVal에는 arr[0]이 들어가고 그 이후에는 reduce가 리턴한 결과값이 들어간다
    // curVal는 항상 다음에 올 배열의 값이 온다 => 알고리즘에 많이 사용됨
    return preVal + curVal;
});
console.log(`result : ${result}`);

//reduce로 계산한 것을 forEach로 풀어서 설명(결과 같이 동일)
let sum = 0;
arr.forEach(item => {
    sum += item;
})

console.log(`sum : ${sum}`);