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
    },
    'map' : function(cb) {
        var mapArr = [];
        for (let i = 0; i < arr.length; i++) {
            mapArr.push(cb(this[i]));
        }
        return mapArr;
    }
}
var result2Arr = arr.map(function(item, idx) {
    if(item < 10) {
        return item * 2;
    }
    return item;
});
console.log(result2Arr);