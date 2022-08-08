const arr = {
    '0' : 5,
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
    },
    push: function(num) {
        this[this.length] = num;
        this.length++;
    },
    filter: function(cb) {
        const tempArr = [];
        for (let i = 0; i < this.length; i++) {
            if(cb(this[i], i)) {
                tempArr.push(this[i]);
            }
        }
        return tempArr;
    },
    map: function(cb) {
        const tempArr = [];
        for (let i = 0; i < this.length; i++) {
            tempArr.push(cb(this[i], i));
        }
        return tempArr;
    }
};
const arr2 = arr.map((item, idx) => {
        return idx <= 3 ? item * item : item
});
console.log(arr2);