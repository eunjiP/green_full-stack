const arr = {
    '0' : 2,
    '1' : 6,
    '2' : 10,
    '3' : 11,
    '4' : 22,
    '5' : 1,
    '6' : 7,
    'length' : 7,
    forEach: function(aaaa) { 
        console.log(this.length);
        console.log(this['length']);
    }
};
for(let i=0; i<arr.length; i++) {
    console.log(arr[i]);
}

console.log('-----------');

arr.forEach();  
console.log('arr.length : ' + arr.length);
console.log('arr.length2 : ' + arr['length']);

console.log('-----------');

arr.length = 100;
arr.forEach();  
console.log('arr.length : ' + arr.length);
console.log('arr.length2 : ' + arr['length']);

console.log('-----------');

arr.forEach(item => {   
    console.log('값 : ' + item);
})
arr.forEach(item => {   
    console.log(item + 12);
})
console.log('arr.length : ' + arr.length);
console.log('arr.length2 : ' + arr['length']);

function sum(n1, n2) {
    console.log(n1 + n2);
}
sum(10,20);

const sum2 = function(n1, n2) {
    console.log(n1 + n2);
}
sum2(100,200);