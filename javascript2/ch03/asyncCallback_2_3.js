let menu = '햄버거';

function order(menu, cb) {
    console.log(`${menu}가 주문접수되었습니다.`);
    cb(menu);
}

function pickUp(menu) {
    setTimeout(() => { console.log(`주문하신 ${menu}가 나왔습니다.`);}, 3000)
}
order(menu, pickUp)