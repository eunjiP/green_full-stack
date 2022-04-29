function proc(cb, max) {
    for(var i=0; i<max; i++) {
        cb(i);
    }
}

function print(item) {
    console.log('noName : ' + item);
}

proc(print, 3);
proc(function(item) {
    console.log('noName : ' + item);
}, 3);