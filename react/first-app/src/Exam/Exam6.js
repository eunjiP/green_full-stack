import { useEffect, useState } from "react";

function Hello() {
    //Hello의 훅을 설정
    useEffect(() => {
        console.log('Hello!');
        //사라질때 표시
        return () => {
            console.log('Bye!!');
        }
    }, []);

    return (
        <div>
            <strong>Hello!!!!</strong>
        </div>
    );
}

export default function Exam6() {
    const [ showing, setShowing ] = useState(false);
    const onClickBtn = () => {
        //showing값이 true > false, false > true 가 되도록 한다.
        // setShowing(showing => showing === true ? showing = false : showing = true);
        // 강사님 풀이
        //boolen일때 토글하는 방법(숫자 => 1 - n)
        setShowing(preVal => !preVal);
    }

    return (
        <div>
            <button onClick={onClickBtn}>
                {showing ? 'hide' : 'show'}
            </button>
            {showing ? <Hello /> : null}
        </div>
    )
}