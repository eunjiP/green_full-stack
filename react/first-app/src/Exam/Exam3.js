import { useState, memo } from 'react';
import Button from './Button';
import './Exam3.css';

export default function Exam3() {
    const [ val, setVal ] = useState('버튼1');
    const btn1OnClick = () => setVal('Button1');
    const MemorizedBtn = memo(Button);
    return (
        <div>
            <MemorizedBtn text={val} color="red" onClick={btn1OnClick} />
            <MemorizedBtn text="버튼2" color="blue" />
            <MemorizedBtn text="버튼3" color="pink" />
        </div>
    );
}