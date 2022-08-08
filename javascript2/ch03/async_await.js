const cleanRoom = () => new Promise((resolve) => {
    resolve('I cleaned the room');
});

const removeGarbage = (msg) => new Promise((resolve) => {
    resolve(msg + ', I threw away the trash');
});

const winIcecream = (msg) => new Promise((resolve) => {
    resolve(msg + ', so I got to eat some ice cream.');
});

//소스적으로는 짧아지고 async라는 함수가 더 필요하다는 단점
const fn = async () => {
    const r1 = await cleanRoom();
    const r2 = await removeGarbage(r1);
    const r3 = await winIcecream(r2);
    console.log(r3);
};
//위와 같은 내용
async function fn2() {
    const r1 = await cleanRoom();
    const r2 = await removeGarbage(r1);
    const r3 = await winIcecream(r2);
    console.log(r3);
}

fn();
fn2();