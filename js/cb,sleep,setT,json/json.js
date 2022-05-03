const obj = {
    name : "Lee",
    age : 20,
    alive : true,
    hobby : ["traveling", "tennis"]
};

//JSON.stringify(객체) : 객체를 JSON포맷의 문자열로 변환
//typeof : 연산자는 피연산자의 평가 전 자료형을 나타내는 문자열로 반환
const json = JSON.stringify(obj);
console.log(typeof json, json);     //typeof json => string이 반환, json 반환

//JSON.stringify(객체, null, 숫자) : 객체를 JSON포맷의 문자열로 변환하는데 숫자만큼 들여쓰기
const prettyJson = JSON.stringify(obj, null, 2);
console.log(typeof prettyJson, prettyJson);

function filter(key, value) {
    //값이 숫자면 필터링되어 반환하지마라
    return typeof value === 'number' ? undefined : value;   
}
const strFilteredObject = JSON.stringify(obj, filter, 2);
console.log(typeof strFilteredObject, strFilteredObject);