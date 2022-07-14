<template>
  <table>
      <thead>
        <tr>
          <th>순위</th>
          <th>영화제목</th>
          <th>개봉일</th>
          <th>누적관객수</th>
          <th>누적매출액</th>
        </tr>
      </thead>
      <tbody>
        <rank-row v-for="(item) in list" :key="item.movieCd" :item="item" />
      </tbody>
    </table>
</template>

<script>
import RankRow from './RankRow.vue'
export default {
  components: { RankRow },
  //전달 받을 변수와 타입 적는 곳
  props: {
    list: Array
  }
}
</script>

<style>

</style>