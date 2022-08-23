import { useState } from 'react';

function Exam2() {
    /*
    const data = useState(0);
    const counter = data[0];
    const setCounter = data[1];
    */

    const [ counter, setCounter ] = useState(10);
    const [ counter2, setCounter2 ] = useState(20);

    function countUp() {
        /*
        counter = counter + 1;
        console.log(counter);
        console.log(data);
        */
       //setCounter(counter + 1);
       setCounter( preVal => preVal + 1 );
    }

    return (
        <div>            
            <h1>클릭 카운터 수 : { counter }</h1>
            <button onClick={ countUp }>Click Me</button>
        </div>        
    );
}

export default Exam2; 