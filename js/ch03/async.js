//콜백 지옥
console.log('A');
setTimeout(function() {
    console.log('B');

    setTimeout(function() {
        console.log('C');

        setTimeout(function() {
            console.log('D');
        }, 500);
    }, 1000);
}, 2000);

