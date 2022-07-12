<template>
  <section>
    <transition-group name="list" tag="ul">
      <!-- 반복문에는 key설정이 꼭 필요하다(vue든 리엑트든) -->
      <li :key="todoItem.itodo" v-for="todoItem in propsItems" class="shadow">
        <i class="checkBtn fas fa-check" aria-hidden="true"></i>
          <div class="grow_1 d-flex flex-col justify_content_evenly">
            <div class="ctnt">{{ todoItem.todo }}</div>
            <div class="small_text">{{ todoItem.created_at }}</div>
          </div>
        <span class="removeBtn" type="button" @click="removeTodo(todoItem.itodo)">
          <i class="far fa-trash-alt" aria-hidden="true"></i>
        </span>
      </li>
    </transition-group>
  </section>
</template>

<script>
export default {
  //타입까지 정확히 넣으려면 객체로 넘겨야하고 아니면 배열로 넘기는것도 가능함(['todoList'])
  props: {
    propsItems:Array
  },
  methods: {
    removeTodo(key) {
      // 로컬스트로지 삭제와 배열삭제가 동시에 일어남으로 실시간 반영된다
      // localStorage.removeItem(todoItem);
      // this.todoItems.splice(index, 1);
      this.$emit('childDelTodo', key);
    }
  }
}
</script>

<style scoped>
  .list-enter-active, .list-leave-active {transition: all 1s;}
  .list-leave-to { opacity: 0; transform: translateY(30px);}
  .list-enter-from { opacity: 0; transform: translateY(-30px);}
  ul { list-style: none; padding-left: 0; margin-top: 0; text-align: left;}
  li {
    display: flex;
    margin: 0.5rem 0; 
    padding: 0 0.9rem;
    background-color: white;
    border-radius: 5px;
  }
  .checkBtn { line-height: 50px; color: #62acde; margin-right: 10px;}
  .removeBtn { line-height: 50px; margin-left: auto; color: #de4343; cursor: pointer;}
  .small_text {font-size: 0.8rem; color: #828181;}
</style>