import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home';
import BoxOfficeByDay from '../views/boxOfficeByDay';
import BoxOfficeByWeek from '../views/BoxOfficeByWeek';


const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/boxOfficebyday',
    name: 'boxOfficebyday',
    component: BoxOfficeByDay
  },
  {
    path: '/boxOfficebyWeek',
    name: 'boxOfficebyWeek',
    component: BoxOfficeByWeek
  },
 
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
