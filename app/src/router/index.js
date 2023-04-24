import { createRouter, createWebHistory } from 'vue-router'
import HomePage from '../components/HomePage.vue'
import RestaurantPage from '../components/RestaurantPage.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'HomePage',
      component: HomePage
    },
    {
      path: '/RestaurantPage',
      name : 'RestaurantPage',
      component: RestaurantPage
    },
  ]
})

export default router
