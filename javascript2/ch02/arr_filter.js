const arr = [11, 22, 33, 44, 55, 66, 77, 88, 99];
// filter : 내가 원하는 값으로 새로운 배열 생성이 가능하고 원하는 값만 return True를 하면 됨
const arr2 = arr.filter(item => {
    //3의 배수만 담기는 새로운 배열이 생성
    return item % 3 === 0 ;
});
console.log(arr2);
