import { useState } from "react";

export default function TodoApp() {
    const [ todo, setTodo ] = useState('');
    const [ todoList, setTodoList ] = useState([]);

    const onChange = (e) => {
        setTodo(todo => todo = e.target.value);
    }


    const onSubmit = (e) => {
        //form의 submit기능을 막는 역할
        e.preventDefault();
        //리액트는 push를 사용할 수 없음으로 새로운 배열을 할당해야함
        if(todo === '') { return; }
        setTodoList(todoList => todoList = [todo, ...todoList]);
        setTodo('');
    }

    return (
        <div>
            <h1>My Todo List</h1>
            <form onSubmit={ onSubmit }>
                <input
                    type="text"
                    placeholder="Write your to do ..."
                    value={ todo }
                    onChange={ onChange }
                />
                <button>Add To do</button>
            </form>
            <ul>
                { todoList.map((item, idx) => (<li key={idx}>{item}</li>)) }
            </ul>
        </div>
    )
}