<template>
  <div>
    <h1>BoxOfficeByDay</h1>
    <div>
      <input type="date" v-model="selectedDate" @change="search">
      <!-- <button>검색</button> -->
    </div>
    <RankTable :list="list"></RankTable>
  </div>
</template>

<script>
import RankTable from '../components/BoxOffiec/RankTable.vue';

export default {
  data() {
    return {
      list:[],
      selectedDate:''
    }
  },
  methods: {
    async getData(targetDt) {
      const data = await this.getBoxOfficeByDay(targetDt);
      this.list = data.boxOfficeResult.dailyBoxOfficeList;
    },
    search() {
      const targetDt = this.selectedDate.replaceAll('-', '');
      this.getData(targetDt);
    }
  },
  created() {
    const d = new Date();
    d.setDate(d.getDate()-1);
    this.selectedDate = this.getDateStr(d);
    this.search();
  },
  components: {
    RankTable,
  }
}
</script>
