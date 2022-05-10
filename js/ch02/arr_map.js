var arr = [2, 6, 10, 11, 22, 1, 7];
//원본 값은 유지하면서 가공해서 리턴한다
var resultArr = arr.map(function(item, idx) {
    return item * 2;
});

console.log(resultArr);
console.log(arr);

//10미만 값만 * 2되게 해주시고 10이상은 원래 값인 배열을 하나더 만들어주세요
var result2Arr = arr.map(function(item, idx) {
    if(item < 10) {
        return item * 2;
    }
    return item;
});

console.log(result2Arr);