<template>
  <h1>헬로우</h1>
  <!-- hello라는 변수에 안녕이 담기고 출력하면 안녕이라는 값이 보인다 -->
  <div>{{ hello }}</div>
  <div>{{ hello }}</div>
  <div>{{ hello }}</div>
  <div>{{ hello }}</div>
  <!-- v-model : 변수의 내용을 모두 수정해준다 -->
  <input type="text" v-model="hello">
  <!-- v-on:click 을 줄여서 @click 으로 표현가능 -->
  <button v-on:click="changeHello">안녕하세요. 변경</button>
  <FavoriteSinger/>
  <FavoriteSingerProps imgSrc="https://entertainimg.kbsmedia.co.kr/cms/uploads/PERSON_20211014175403_226414700271e1fd193e1889d98f89d0.jpg"/>
</template>

<script>
import FavoriteSinger from './components/FavoriteSinger.vue';
import FavoriteSingerProps from './components/FavoriteSingerProps.vue';

export default {
  name: 'App',
  //함수 형식으로 작성해야함
  data() {
    return {
      hello: "안녕"
    }
  },
  methods: {
    changeHello() {
      // 몇군데가 있던 모두 변경 해줌(Virtual DOM)
      this.hello = "안녕하세요.";
    }
  },
  components: {
    FavoriteSinger,
    FavoriteSingerProps
}
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
