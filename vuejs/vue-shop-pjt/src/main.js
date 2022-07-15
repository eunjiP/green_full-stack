import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import mixins from '../mixins'

createApp(App)
.mixin(mixins)
.use(store)
.use(router)
.mount('#app');

window.Kakao.init('7bfb673c0f6bf2c1ea0c0bdce834d211');
