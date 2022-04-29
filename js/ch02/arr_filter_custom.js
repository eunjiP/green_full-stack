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
    },
    'filter' : function(cb) {
        var tempArr = [];
        for (let i = 0; i < this.length; i++) {
            if(cb(this[i], i)) {
                tempArr.push(this[i]);
            }
        }
        return tempArr;
    }
}
var resultArr = arr.filter(function(item, idx) {
    console.log(`${idx}: ${item}`);
    if(item <= 8) {
        return true;
    }
});
console.log(resultArr);

//배열의 map, reduce콜백 함수에 대한 이해, 비동기에 대한 이해, 콜백 지옥, promise, async/await