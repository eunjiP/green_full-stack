
const str = "안녕하세요. 반갑습니다.";

//원형의 프로토타입을 알지 못하면 자식으로 접근해서 함수를 정의하는 방법도 있음
str.__proto__.left = function(len) {
    return this.substring(0, len);
}

// String.prototype.left = function(len) {
//     // return this.substr(0, len);
//     return this.substring(0, len);
// }

const str2 = str.left(3);

console.log(str2);
console.log(str);