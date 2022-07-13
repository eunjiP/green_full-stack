<template>
  <div>
    <h1>나의 이름은 홍길동입니다.</h1>
    <!-- .number : 이부분이 없으면 처음에는 정수라도 나중에 문자열로 변경됨
    타입을 숫자 또는 .number를 사용하면 됨 -->
    <input type="number" v-model.number="numberModel">
    {{ printNumber }}
    <div>
      <label>여성<input type="radio" v-model="gender" value="0"></label>
      <label>남성<input type="radio" v-model="gender" value="1"></label>
    </div>
    <div>{{ gender }}</div>
    <div>{{ printGender }}</div>
    <div>
      <h3>p.96</h3>
      <!-- v-html : 태그가 포함된 문자열이면 태그로 인식해서 찍어줌 -->
      <div v-html="htmlString"></div>
    </div>
    <hr>
    <div>
      <h3>p.99</h3>
      <textarea v-model="message"></textarea>
    </div>
    <div>
      <h3>p.100 - 지역 번호 : {{ city }}</h3>
      <select v-model="city">
        <option value="02">서울</option>
        <option value="21">부산</option>
        <option value="064">제주</option>
      </select>
    </div>
    <div>
      <h3>p.101 - {{ basketball }}, {{ football }}</h3>
      <label><input type="checkbox" v-model="basketball">농구</label>
      <label><input type="checkbox" v-model="football" true-value = "1" false-value="0">풋볼</label>
    </div>
    <div>
      <input type="text" v-model="textValue1">
      <input type="text" v-model="textValue2">
      <br>
      <!-- 두개가 일치할때만 활성화 되도록 하는 버튼 -->
      <button type="button" v-bind:disabled="textValue1=== '' || textValue1 !== textValue2">전송</button>
    </div>
    <div>
      <h3> p.107 </h3>
      <!-- class에 true인것만 추가가된다 -->
      <!-- 방식1 -->
      <div class="container" v-bind:class="{'active' : isActive, 'text-red':hasError}">
        Class Binding
      </div>
      <!-- 방식2 -->
      <div class="container" :class="[activeClass, errorClass]">
        Class Binding
      </div>
      <!-- 방식3 -->
      <div class="container" :class="clsArr">
        Class Binding
      </div>
    </div>
    <hr>
    <div>
      <h3>p.110</h3>
      <div :style="styleObj">인라인 스타일 바인딩</div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      styleObj: {
        color: 'red',
        fontSize: '30px'  //font-size, backgroind-color > backgroindColor
      },
      clsArr: ['active', 'text-red'],
      activeClass: 'active',
      errorClass: 'text-red',
      numberModel: 3,
      gender: '0',
      htmlString: '<p style="color:red">This is a red string</p>',
      message: 'textarea입니다.',
      city: '064',
      basketball: false,
      football: '0',
      textValue1: '',
      textValue2: '',
      isActive: false,
      hasError: true,
    }
  },
  // computed : watch랑 비슷 / 바뀌면 바꾸겠다 이런느낌(함수명만 적으면됨/주로 천단위 콤마, 여성남성 0, 1로 찍을때 등)
  computed: {
    printNumber() {
      return this.numberModel + 3;
    },
    printGender() {
      // ===했을때는 한번만 적용됨(==으로 해야함) => 결국 .number은 타입이 숫자일때만된다는 이야기임
      return this.gender === '0' ? '여성' : '남성';
    }
  }
}
</script>

<style>
  .container { width: 100%; height: 200px;}
  .active { background-color: yellow; font-weight: bold;}
  .text-red { color: red;}
</style>