import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import socketPlugin from "./plugins/socketPlugin";

createApp(App)
.use(router)
.use(socketPlugin)
.mount('#app');
