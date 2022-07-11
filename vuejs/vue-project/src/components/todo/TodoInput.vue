<template>
  <div class="inputBox shadow">
    <input type="text" v-model="newTodoItem" @keyup.enter="addTodo" placeholder="Type what you have to do">
    <span class="addContainer" @click="addTodo">
        <i class="addBtn fas fa-plus" aria-hidden="true"></i>
    </span>
  </div>
</template>

<script>
export default {
    data() {
        return {
            newTodoItem: ''
        }
    },
    methods: {
        addTodo() {
            if(this.newTodoItem.trim() !== '') { 
                const value = this.newTodoItem.trim();
                //localStorage.setItem(value, value);
                //$emit : 특수한 기능을 가지고 있음 / 'childAddTodo'라는 함수를 호출하고 값을 전달한다
                this.$emit('childAddTodo', value);
            } else {
                this.$emit('alertTodo');
            }
            this.newTodoItem = '';
        }
    }
}
</script>

<style scoped>
    input:focus { outline: none;}
    .inputBox { 
        background-color: white; height: 50px; line-height: 50px; border-radius: 5px;
        display: flex;
        padding-left: 5px;
    }
    .inputBox input {
        border-style: none; font-size: 0.9rem;
        flex-grow: 1;
        padding: 0 10px;
    }
    .addContainer { 
        background: linear-gradient(to right, #6478FB, #8763FB);
        width: 3rem;
        border-radius: 0 5px 5px 0;
    }
    .addContainer > .addBtn { color: white; }
</style>