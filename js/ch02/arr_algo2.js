var arr = [2, 6, 10, 11, 22, 1, 7];

var arr = {
    '0':2,
    '1':6,
    '2':10,
    '3':11,
    '4':22,
    '5':1,
    '6':7,
    'length' : 7,
    'forEach' : function(cb) {
        for (let i = 0; i < arr.length; i++) {
            cb(this[i]); 
        }
    }
}

var sum2 = 0;
arr.forEach(function(item) {
    sum2 += item;
});
console.log(`sum2 : ${sum2}`);


//forEach, filter, map