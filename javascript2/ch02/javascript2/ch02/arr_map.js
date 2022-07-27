const arr = [11, 22, 33, 44, 55, 66, 77, 88, 99];

//filter는 길이는 변해도 값은 변하지 않음
// 반면, map은 길이는 동일하지만 값을 변경시킬 수 있음 (공통점은 두개다 비파괴-원본은 변경되지않음)

const arr2 = arr.map(item => {
    return item - 1;
});
console.log(arr2);