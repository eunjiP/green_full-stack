import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import IntroduceView from '../views/IntroduceView.vue';
import DataBindingList from '../views/DataBindingList.vue';
import Rendering from '../views/Rendering.vue';
import EventClick from '../views/EventClick';

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.

    ///* webpackChunkName: "about" */ : 이부분이 Lazy Load로 주석을 넣어주면 적용
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  },
  {
    path: '/intro',
    name: 'intro',
    component:IntroduceView
  },
  {
    path: '/databindinglist',
    name: 'databindinglist',
    component:DataBindingList
  },
  {
    path: '/rendering',
    name: 'rendering',
    component:Rendering
  },
  {
    path: '/eventclick',
    name: 'eventclick',
    component:EventClick
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
