let menu = '햄거버';

function order(menu, cb) {
    console.log(`${menu} 주문이 접수되었습니다.`);
    cb(menu);
}

function pickUp(menu) {
    setTimeout(() => {console.log(`주문하신 ${menu} 나왔습니다.`)}, 3000)
}

order(menu, pickUp)