const set = new Set();
console.log(set);

set.add(1).add(2).add(2);   //여러 값을 추가가능(중복값은 추가안됨)
console.log(set);

const set1 = new Set();
console.log(NaN === NaN);   //같지 않다고 false가 나오지만
console.log(0 === 0);

set1.add(NaN).add(NaN);     //set에 추가하려고 하면 중복되어 제외됨
console.log(set1);

set1.add(0).add(-0);    //+0과 -0은 중복으로 취급하여 제외된다.
console.log(set1);