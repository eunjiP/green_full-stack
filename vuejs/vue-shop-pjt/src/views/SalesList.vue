<template>
  <main class="mt-3">
    <div class="container">
      <div class="float-end mb-2">
        <router-link class="nav-link" to="/create">
          <button type="butto" class="btn btn-dark">제품등록</button>
        </router-link>
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th></th>
            <th>제품명</th>
            <th>제품가격</th>
            <th>배송비</th>
            <th>추가 배송비</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(productItem, Idx) in productList" :key="productItem.id">
            <td>
              <img v-if="productItem.path !== null" :src="`/static/img/${productItem.id}/1/${productItem.path}`" style="height:50px; width:auto;">
            </td>
            <td>{{ productItem.product_name }}</td>
            <td>{{ productItem.product_price }}</td>
            <td>{{ productItem.delivery_price }}</td>
            <td>{{ productItem.add_delivery_price }}</td>
            <td>
              <!-- 1) 통신을 두번해서 받는 방법
              <router-link class="nav-link" :to="{path: '/image_insert', query:{product_id:productItem.id}}">
                <button type="button" class="btn btn-info me-1">사진등록</button>
              </router-link> -->

              <!-- 2) 통신하지 않고 정보를 다음 페이지로 전달해주는 방식 -->
              <button type="button" class="btn btn-info me-1" @click="goToImageInsert(Idx)">사진등록</button>
              <button type="button" class="btn btn-warning me-1">수정</button>
              <button type="button" class="btn btn-danger" @click="deleteProduct(productItem.id, Idx)">삭제</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</template>

<script>

export default {
  data() {
    return {
      productList: [],
      cate1List: [],
      cate2List: [],
      cate3List: []
    }
  },
  created() {
    this.getProductList();
  },
  updated() {
    this.getProductList();
  },
  methods: {
    async getProductList() {
      const result = await this.$get('/api/productList2');
      this.productList = result;
    },
    goToImageInsert(Idx) {
      this.$store.commit('sallerSelectedProduct', this.productList[Idx]);
      this.$router.push( {path: '/image_insert'});
    },
    async deleteProduct(productId, idx) {
      const result = await this.$delete(`/api/productDelect/${productId}`);
      if(result) {
        this.productList.splice(idx, 1);
      }
    }
  }
}
</script>

<style>

</style>