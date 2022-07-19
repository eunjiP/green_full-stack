import { createRouter, createWebHistory } from 'vue-router'
import ProductList from '../views/ProductList';
import ProductDetail from '../views/ProductDetail';
import ProductCreate from '../views/ProductCreate';
import ProductUpdate from '../views/ProductUpdate';
import SalesList from '../views/SalesList';
import ImageInsert from '../views/ImageInsert';
import store from '@/store';
import swal from 'sweetalert2';

// 네비게이션 가드
const requireAuth = () => (to, from, next) => {
  if(store.state.user.iuser === undefined) {
    //fire(타이틀, 내용, 타입)
    swal.fire('로그인을 하세요.', '', 'warning');
    return;
  }
  // 이동할 곳을 지정하고 싶다면 next(이동할 주소)로 해주면 가능
  return next();
}

const routes = [
  {
    path: '/',
    name: 'Home',
    component: ProductList
  },
  {
    path: "/detail",
    name: "ProductDetail",
    component: ProductDetail,
  },

  {
    path: "/create",
    name: "ProductCreate",
    component: ProductCreate,
    //제품등록창에 들어가기전에 로그인이 되어있는지 확인 후 이동가능
    beforeEnter: requireAuth()
  },

  {
    path: "/update",
    name: "ProductUpdate",
    component: ProductUpdate,
  },
  {
    path: "/sales",
    name: "SalesList",
    component: SalesList
  },
  {
    path: "/image_insert",
    name: "ImageInsert",
    component: ImageInsert
  },
];


const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
