//filter : 새로운 배열을 하나씩 만들어준다.(forEach와는 다름)
//내가 원하는 값만 새로운 배열을 만들고 싶을 때 사용
//하나씩 뺴서 값을 넣어주는데 리턴은 boolen값으로 넣어줘야함

var arr = [2, 6, 10, 11, 22, 1, 7];
var resultArr = arr.filter(function(item, idx) {
    console.log(`${idx}: ${item}`);
    if(item <= 8) {
        return true;
    }
});


console.log(resultArr);

var newArr = [];
newArr.push(10);
newArr.push(12);
console.log(newArr);

// newArr[0] = 10;
// newArr[1] = 12;
// newArr[5] = 14;
// console.log(newArr);
// newArr.length = 1;  //1개을 제외하고 나머지 사라짐
// console.log(newArr);