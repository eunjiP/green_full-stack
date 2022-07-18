<template>
  <main class="mt-3">
    <div class="container">
      <h2 class="text-center">제품등록</h2>
      <div class="mb-3 row">
        <label class="col-md-3 col-form-label">제품명</label>
        <div class="col-md-9">
          <input type="text" class="form-control" v-model="product.product_name">
        </div>
      </div>
      <div class="mb-3 row">
        <label class="col-md-3 col-form-label">제품가격</label>
        <div class="col-md-9">
          <div class="input-group mb-3">
            <input type="number" class="form-control" v-model="product.product_price">
            <span class="input-group-text">원</span>
          </div>
        </div>
      </div>
      <div class="mb-3 row">
        <label class="col-md-3 col-form-label">배송비</label>
        <div class="col-md-9">
          <div class="input-group mb-3">
            <input type="number" class="form-control" v-model="product.delivery_price">
            <span class="input-group-text">원</span>
          </div>
        </div>
      </div>
      <div class="mb-3 row">
        <label class="col-md-3 col-form-label">추가배송비(도서산간)</label>
        <div class="col-md-9">
          <div class="input-group mb-3">
            <input type="number" class="form-control" v-model="product.add_delivery_price">
            <span class="input-group-text">원</span>
          </div>
        </div>
      </div>
      <div class="mb-3 row">
        <label class="col-md-3 col-form-label">카테고리</label>
        <div class="col-md-9">
          <div class="row">
            <div class="col-auto">
              <select class="form-select" v-model="cate1" @change="changeCate1">
                 <!-- (1차 자식의 value값, 1차 자식의 key 값) of categoryObj : of는 객체일때 사용 -->
                <option :key="name" v-for="(value, name) of categoryObj">{{ name }}</option>
              </select>
            </div>
            <div class="col-auto" v-if="cate1 !== ''">
              <select class="form-select" v-model="cate2" @change="changeCate2">
                <option :key="name" v-for="(value, name) of categoryObj[cate1]">{{ name }}</option>
              </select>
            </div>
            <div class="col-auto" v-if="cate2 !== ''">
               <select class="form-select" v-model="selectedCateId">
              <!-- (cate, idx) in categoryObj[cate1][cate2] : 마지막은 배열이므로 in 사용 -->
                <option :value="cate.id" :key="cate.id" v-for="cate in categoryObj[cate1][cate2]">{{ cate.value }}</option>
              </select>
            </div>
            {{  selectedCateId }}
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-md-3 col-form-label">태그</label>
          <div class="col-md-9">
            <input type="text" class="form-control" v-model="product.tags">
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-md-3 col-form-label">출고일</label>
          <div class="col-md-9">
            <div class="input-group mb-3">
              <input type="number" class="form-control" v-model="product.outbound_days">
              <span class="input-group-text">일 이내 출고</span>
            </div>
          </div>
        </div>
      </div>
      <div class="mb-3 row">
        <div class="col-6 d-grid p-1">
          <button type="button" class="btn btn-lg btn-dark" @click="goToList">취소</button>
        </div>
        <div class="col-6 d-grid p-1">
          <button type="button" class="btn btn-lg btn-danger" @click="productInsert">저장</button>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  data() {
    return {
      product: {
        product_name: '',
        product_price: 0,
        delivery_price: 0,
        add_delivery_price: 0,
        tags: '',
        outbound_days: 0,
        category_id: 1,
        seller_id: 1
      },      
      categoryObj: {},    
      cate1: '',
      cate2: '',
      selectedCateId: '',
    };
  },
  created() {
    this.getCategoryList();
  },
  methods: {
    async getCategoryList() {
      const categoryList = await this.$get('/api/categoryList', {});
      console.log(categoryList);

      let cate1 = '';
      let cate2 = '';      
      categoryList.forEach(item => {
        //item.cate1과 변수 cate1이 다르면
        if(item.cate1 !== cate1) {
          //변수에 item.cate1를 담는다
          cate1 = item.cate1;
          //categoryObj 배열에 cate1의 키값으로 빈값넣어라
          this.categoryObj[cate1] = {};
          cate2 = '';          
        }
        //변수와 DB의 값이 다르면
         if(item.cate2 !== cate2) {
          //변수에 DB값을 담고
          cate2 = item.cate2;
          //categoryObj의 cate1키의 cate2키에 빈값을 넣는다
          this.categoryObj[cate1][cate2] = [];
        }  
        //최종적으로 pk값과 cate3값만 객체화 시킨다
        const obj = {
          id: item.id,
          value: item.cate3
        }      
        this.categoryObj[cate1][cate2].push(obj);
        // 결국 아래와 같은 형태(객체 안에 객체 안에 배열이 담긴다)
        // categoryObj : {
        //   'cate1': {
        //     'cate2':[
        //       {id:pk, value:'cate3-1'},
        //       {id:pk, value:'cate3-2'},
        //     ]
        //   }
        // }
      });      
    },
     changeCate1() {
      this.cate2 = '';
      this.selectedCateId = '';
    },
    changeCate2() {
      this.selectedCateId = '';
    },
  }
}
  
</script>

<style>

</style>