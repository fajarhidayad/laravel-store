import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '@/views/HomeView.vue'
import LoginView from '@/views/LoginView.vue'
import RegisterView from '@/views/RegisterView.vue'
import CartView from '@/views/CartView.vue'
import UserLayout from '@/layouts/UserLayout.vue'

import AdminLayout from '@/layouts/AdminLayout.vue'
import AdminLoginView from '@/views/admin/AdminLoginView.vue'
import AdminDashboardView from '@/views/admin/AdminDashboardView.vue'
import AdminProductView from '@/views/admin/AdminProductView.vue'

import NotFoundView from '@/views/errors/NotFoundView.vue'
import AdminOrderView from '@/views/admin/AdminOrderView.vue'
import AdminUsersView from '@/views/admin/AdminUsersView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      component: UserLayout,
      children: [
        {
          path: '',
          name: 'home',
          component: HomeView
        },
        {
          path: 'login',
          name: 'login',
          component: LoginView
        },
        {
          path: 'register',
          name: 'register',
          component: RegisterView
        },
        {
          path: 'cart',
          name: 'cart',
          component: CartView
        }
      ]
    },
    {
      path: '/admin',
      component: AdminLayout,
      redirect: { name: 'Dashboard' },
      children: [
        {
          path: 'dashboard',
          name: 'Dashboard',
          component: AdminDashboardView
        },
        {
          path: 'order',
          name: 'Order',
          component: AdminOrderView
        },
        {
          path: 'products',
          name: 'Products',
          component: AdminProductView
        },
        {
          path: 'users',
          name: 'Users',
          component: AdminUsersView
        }
      ]
    },
    {
      path: '/admin/login',
      component: AdminLoginView
    },
    {
      path: '/:pathMatch(.*)*',
      name: 'NotFound',
      component: NotFoundView
    }
  ]
})

export default router
