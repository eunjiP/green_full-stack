const arr = {
    '0' : 2,
    '1' : 6,
    '2' : 10,
    '3' : 11,
    '4' : 22,
    '5' : 1,
    '6' : 7,
    '7' : 11,
    'length' : 8,
    forEach: function(cb) { 
        for (let i = 0; i < this.length; i++) {
            //함수를 호출해준다
            cb(this[i], i)
        }
    }
};

console.log('-----------');

arr.forEach((item, idx) => {   
    console.log(`arr[${idx}] : ${item}`);
})
