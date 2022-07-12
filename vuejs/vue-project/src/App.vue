<template>
  <div id="app">
    <TodoHeader/>
    <!-- input에 이벤트를 걸어서 서로 연결되게끔 한다 -->
    <TodoInput @childAddTodo="addTodo" @alertTodo="changeShow"></TodoInput>
    <!-- 스크립트 안에 있는 값을 사용할때는 v-bind를 적어줘야함 -->
    <TodoList :propsItems="todoItems" @childDelTodo="removeTodo"></TodoList>
    <TodoFooter @childAllClear="clearTodo"></TodoFooter>
  </div>
  <AlertModal :show="modalShow" header="알림창" body="내용을 입력해주세요" @close="changeShow"></AlertModal>
</template>

<script>
import TodoHeader from './components/todo/TodoHeader.vue';
import TodoInput from './components/todo/TodoInput.vue';
import TodoList from './components/todo/TodoList.vue';
import TodoFooter from './components/todo/TodoFooter.vue';
import AlertModal from './components/common/AlertModal.vue';
import axios from 'axios';
import DateUtils from './utils/DateUtils';

  export default {
    name: 'App',
    data() {
      return {
        todoItems: [],
        modalShow:false
      }
    },
    methods: {
      addTodo(todoItem) {
        // localStorage.setItem(todoItem, todoItem);
        axios.post('/todo/index', {todo:todoItem})
        .then(res => {
          if(res.status === 200 && res.data) {
            const item = {
              'itodo': res.data.result,
              'todo' : todoItem,
              'created_at' : DateUtils.getTimestamp(new Date())
            }
            this.todoItems.push(item);
          }
        });
      },
      changeShow() {
        // 삼항식 사용시 이벤트 중첩으로 오류 발생함 => click.stop="";이라는 이벤트 종료를 주면 해결
        this.modalShow === true? this.modalShow = false : this.modalShow = true;
      },
      removeTodo(key) {
        // localStorage.removeItem(todoItem);
        // this.todoItems.splice(index, 1);
        this.todoItems.forEach((item, idx) => {
          if(item.itodo === key) {
            this.todoItems.splice(idx, 1);
            axios.delete(`/todo/index/${item.itodo}`)
            .then(res => {
              console.log(res);
            })
          }
        })
      },
      clearTodo() {
        axios.delete('/todo/index')
        .then(res => {
          if(res.data.result > 0) {
            this.todoItems.splice(0);
          }
        })

        // for(let i=0; i < localStorage.length; i++) {
        //   this.todoItems.pop();
        // }
        // localStorage.clear();
      },
      //비시퀀스 형태로 담기므로 순서가 계속 바뀜으로 시퀀스 형태로 변경(문자열로 변경)하여 로컬스트로지에 담는다
    },
    components: {
      TodoHeader,
      TodoInput,
      TodoList,
      TodoFooter,
      AlertModal
    },
    // 매번 changeValue를 호출하면 유연성이 떨어짐으로 배열의 주소값을 확인해서 값이 변할때 함수가 호출되게 하는 역할
    // watch 안에는 deep이 들어가야한다면 객체 형태로 deep, handler함수를 같이 적는다
    // watch: {
    //   todoItems: {
    //     // deep : 객체/배열는 객체 안의 값이 변함(주소값은 유지되면서 안의 값이 변화하는 경우)으로 deep으로 안에 있는 값이 변하는지 확인하는 용도(남의 내용이 변화 하는 것에 이벤트 적용하려면 deep이 필수/주소값도 변화해도 무방하다면 deep이 필요없음)
    //     deep: true,
    //     handler() {
    //       this.changeValue();
    //     }
    //   }
    // },
    //vue 라이프사이클 - 훅
    //created는 만들때만 실행됨으로 실시간 적용이 안된다
    //따라서 input할때 로컬스트로지에 값을 넣으면서 배열에도 추가가 동시에 이루어져야함
    created() {
      // if(localStorage.length > 0) {
      //   for(let i=0; i < localStorage.length; i++) {
      //     this.todoItems.push(localStorage.key(i));
      //   }
      // }
      axios.get('/todo/index')
      //주는게 없음으로 .then한개만
      .then(res=> {
        if(res.status === 200 && res.data.length > 0) {
          res.data.forEach(item => {
            this.todoItems.push(item);
          })
        }
      })
      // if(json) {
      //   const todoItems = JSON.parse(json);
      //   todoItems.forEach(item => {
      //     this.todoItems.push(item);
      //   });
      //   //키값이 중복되지 않도록 하기 위함(삭제시 key값은 유지됨)
      //   const cnt = localStorage.getItem('cnt');
      //   this.cnt = cnt;
      // }
    },
  }
</script>

<style>
body { text-align: center; background: #F6F6F8;}
input {border-style: groove; width: 200px;}
button { border-style: groove;}

.ctnt {font-size: 1rem;}
.d-flex {display: flex;}

.flex-row {flex-direction: row;}
.flex-col {flex-direction: column;}
.grow_1 {flex-grow: 1;}
.shadow { box-shadow: 5px 10px 10px rgba(0, 0, 0, 0.03); }
.justify_content_evenly {justify-content: space-evenly;}
</style>
