var h1 = {
    'name' : '홍길동',
    'age' : 20,
    'showMe' : function() {
        console.log(`My name is ${this.name}, age is ${this.age}.`);
    }
};
var h2 = {
    'name' : '둘리',
    'age' : 120,
    'showMe' : function() {
        console.log(`My name is ${this.name}, age is ${this.age}.`);
    }
};
h1.showMe();
h2.showMe();