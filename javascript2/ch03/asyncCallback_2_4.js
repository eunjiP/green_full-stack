let menu = '감자튀김';

function order(menu, cb) {
    console.log(`${menu}이 주문접수 되었습니다.`);
    cb(menu);
}

function pickUp(menu) {
    setTimeout(() => { console.log(`주문하신 ${menu} 나왔습니다.`);}, 3000)
}

order(menu, pickUp)