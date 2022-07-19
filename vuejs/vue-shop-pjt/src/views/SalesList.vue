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
          <tr v-for="(productItem) in productList" :key="productItem.id">
            <td></td>
            <td>{{ productItem.product_name }}</td>
            <td>{{ productItem.product_price }}</td>
            <td>{{ productItem.delivery_price }}</td>
            <td>{{ productItem.add_delivery_price }}</td>
            <td>
              <router-link class="nav-link" :to="{path: '/image_insert', query:{product_id:productItem.id}}">
                <button type="button" class="btn btn-info me-1">사진등록</button>
              </router-link>
              <router-link class="nav-link" :to="{path: '/update', query:{product_id:productItem.id}}">
                <button type="button" class="btn btn-warning me-1">수정</button>
              </router-link>
              <router-link class="nav-link" :to="{path: '/image_insert', query:{product_id:productItem.id}}">
                <button type="button" class="btn btn-danger">삭제</button>
              </router-link>
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
      productList:[]
    }
  },
  created() {
    this.getProductList();
  },
  methods: {
    async getProductList() {
      const result = await this.$get('/api/productList2');
      this.productList = result;
    }
  }
}
</script>

<style>

</style>