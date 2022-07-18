import { createStore } from 'vuex';
import createPersistedState from 'vuex-persistedstate';


export default createStore({
  state() {
    return {
      user: {}
    }
  },
  mutations: {
    user : (state, data) => {
      state.user = data;
    }
  },
  plugins: [
    createPersistedState({
      //경로가 user일때만 저장하겠다
      paths: ['user']
    })
  ],
});
