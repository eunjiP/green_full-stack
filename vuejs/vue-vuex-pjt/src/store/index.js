import { createStore } from 'vuex';

export default createStore({
  //state안의 값은 직접 수정 불가 mutations을 이용해야 변경가능
  state() {
    return {
      count: 0,
      cart: [
        {
          product_id: 1,
          product_name: '아이폰 거치대',
          category: 'A'
        }
      ]
    };
  },
  getters: {
    cartCount: (state) => {
      return state.cart.length;
    }
  },
  //mutations : 동기처리(메소드관련 만드는 곳)
  mutations: {
    increment(state) {
      state.count++;
    },
    setCount(state, val) {
      state.count = val;
    }
  },
  //actions : 비동기처리(통신 필요시에 활용)
  actions: {
  },
  modules: {
  },
});
