<template>
  <div>
    <div>
        <h1>이벤트 클릭</h1>
        <button type="button" @click="increaseCtn(); printConsole()">Add 1</button>
        <p>The counter is : {{ cnt }}</p>
    </div>
    <div>
        {{ selectedValue }}
        <select v-model="selectedValue" @change="changeSelect">
            <!-- 표시 되는것과 value값을 다르게 하고 싶을때 value를 지정해주면 됨 -->
            <option>서울</option>
            <option>부산</option>
            <option>제주</option>
        </select>
    </div>
    <div>
        {{ txtVal }}
        <!-- change : 작성이 완료 되어야함 / keyup : 그때 그때 변하는 값을 찍는다 
        이벤트를 두개 적용가능 하지만 같은 이벤트를 두개 걸수는 없다-->
        <input type="txtVal" v-model="txtVal" @keyup="changeTxtVal" @keyup.enter="enterTxtVal">
    </div>
  </div>
</template>

<script>
export default {
    data() {
        return {
            txtVal: '',
            selectedValue:'',
            cnt:0
        }
    },
    methods: {
        enterTxtVal() {
            console.log('Enter!!!!');
        },
        changeTxtVal() {
            console.log(this.txtVal);
        }, 
        increaseCtn() {
            this.cnt++;
        },
        printConsole() {
            console.log(this.cnt);
        },
        changeSelect() {
            alert(this.selectedValue);
        }
    }
}
</script>

<style>

</style>