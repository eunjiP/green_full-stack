import { createRouter, createWebHashHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import StoreAcess from '../views/StoreAcess';
import StoreAcess2 from '../views/StoreAcess2';

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView,
  },
  {
    path: '/StoreAcess',
    name: 'StoreAcess',
    component: StoreAcess,
  },
  {
    path: '/StoreAcess2',
    name: 'StoreAcess2',
    component: StoreAcess2,
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;
