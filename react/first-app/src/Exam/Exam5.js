import { useState, useEffect } from "react";

export default function Exam5() {
    // 구조분할
    const [ counter, setCounter ] = useState(0);
    const [ keyword, setKeyword ] = useState('');
    
    const onClickAdd = () => setCounter(preVal => preVal + 1);
    const onClickMinus = () => setCounter(preVal => preVal === 0 ? 0 : preVal - 1);
    const onChangeText = (e) => {
        setKeyword(e.target.value);
    }

    //키워드가 변결될때마다 실행해라
    useEffect(() => {
        //키워드 길이가 5자 이상이면 실행해라
        if(keyword.length > 5) {
            console.log('AAA');
        }
    }, [keyword]);

    //리렌더링(매번 실행)됨으로 한번만 실행 원한다면 useEffect을 이용해서 훅을 변경해야함 
    // 두번씩 실행되는 원인 관련 블로그(https://velog.io/@hyes-y-tag/React-useEffect%EA%B0%80-%EB%91%90%EB%B2%88-%EC%8B%A4%ED%96%89%EB%90%9C%EB%8B%A4%EA%B3%A0)
    console.log('AAA');

    return (
        <div>
            <input
                type="text"
                placeholder="Search here..."
                onChange={ onChangeText }
                value={ keyword }
            />
            <h1>{ counter }</h1>
            <button onClick={ onClickAdd }>+</button>
            <button onClick={ onClickMinus }>-</button>
        </div>
    )
}