<template>
  <main class="mt-3">
    <div class="container">
      <h2 class="text-center">제품 사진 등록</h2>
      <div class="mb-3 row">
        <label class="col-md-3 col-form-label">제품ID</label>
        <div class="col-md-9">{{ productId }}</div>
      </div>
      <div class="mb-3 row">
        <label class="col-md-3 col-form-label">제품명</label>
        <!-- 부트스트랩 grid는 총 9이 되면 된다 -->
        <div class="col-md-9">{{ productDetail.product_name }}</div>
      </div>
      <div class="mb-3 row">
        <label class="col-md-3 col-form-label">섬네일 이미지</label>
        <div class="col-md-9">
          <div class="row">

          </div>
          <input type="file" class="form-control" accept="image/png, image/jpeg" @change="uploadFile($event.target.file, 1)">
          <div class="alert alert-secondary" role="alert">
            <ul>
              <li>이미지 사이즈 : 350 * 350</li>
              <li>파일 사이즈 : 1Mb 이하</li>
              <li>파일 확장자 : png, jpg만 가능</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="mb-3 row">
        <label class="col-md-3 col-form-label">제품 이미지</label>
        <div class="col-md-9">
          <div class="row">
          
          </div>
          <input type="file" class="form-control" accept="image/png, image/jpeg" @change="uploadFile($event.target.file, 2)">
          <div class="alert alert-secondary" role="alert">
            <ul>
              <li>최대 5개 가능</li>
              <li>이미지 사이즈 : 700 * 700</li>
              <li>파일 사이즈 : 1Mb 이하</li>
              <li>파일 확장자 : png, jpg만 가능</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="mb-3 row">
        <label class="col-md-3 col-form-label">제품설명 이미지</label>
        <div class="col-md-9">
          <div class="row">
          
          </div>
          <input type="file" class="form-control" accept="image/png, image/jpeg" @change="uploadFile($event.target.file, 3)">
          <div class="alert alert-secondary" role="alert">
            <ul>
              <li>파일 사이즈 : 5Mb 이하</li>
              <li>파일 확장자 : png, jpg만 가능</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="mb-3 row m-auto">
        <router-link class="nav-link" to="/sales">
          <button type="button" class="btn btn-lg btn-dark">확인</button>
        </router-link>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  data() {
    return {
      productId: 0,
      productName: '',
      productDetail: {},
      productImage: [],
    }
  },
  created() {
    this.productId = this.$route.query.product_id;
    this.getProductDetail();
  },
  methods: {
    async getProductDetail() {
      this.productDetail = await this.$get(
        `/api/productDetail/${this.productId}`, {});
      console.log(productDetail);
    }
  }
}
</script>

<style>
</style>