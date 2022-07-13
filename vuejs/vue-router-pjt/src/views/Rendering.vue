<template>
  <div>
    <h1>Rendering</h1>
    <input type="text" v-model="type"><br>
    <!-- if(가끔씩 사용한다)는 진짜 없는것, show(자주씩 사용한다)는 있는 display-none으로 해놓은것이다 -->
    <h1 v-if="type==='A'">A</h1>
    <h1 v-else-if="type==='B'">B</h1>
    <h1 v-else>C</h1>
    <hr>
    <h1 v-show="type==='A'">A</h1>
    <h1 v-show="type==='B'">B</h1>
    <h1 v-show="type!=='A'&& type!=='B'">C</h1>
  </div>
</template>

<script>
export default {
    data() {
        return {
            type:'A'
        }
    }
}
</script>

<style>

</style>