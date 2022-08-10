const n1 = 1234567;

// n1.__proto__.minus = function(n) {
//     return this - n;
// };

Number.prototype.minus = function(n) {
    return this - n;
}

//7이 출력되면 된다
console.log(n1.minus(3));
console.log(n1.minus(3).toLocaleString());

console.log(n1.toLocaleString());