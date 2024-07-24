<script setup lang="ts">
import DashboardIcon from '@/components/icons/DashboardIcon.vue';
import InOutIcon from '@/components/icons/InOutIcon.vue';
import LogoutIcon from '@/components/icons/LogoutIcon.vue';
import PackageIcon from '@/components/icons/PackageIcon.vue';
import UserIcon from '@/components/icons/UserIcon.vue';
import UsersIcon from '@/components/icons/UsersIcon.vue';
import { RouterView, useRoute, useRouter } from 'vue-router';

const sidebarItems = [
  {
    title: 'Dashboard',
    href: '/admin/dashboard',
    color: "text-emerald-500",
    icon: DashboardIcon
  },
  {
    title: 'Order',
    href: '/admin/order',
    color: "text-amber-500",
    icon: InOutIcon
  },
  {
    title: 'Products',
    href: '/admin/products',
    color: "text-sky-500",
    icon: PackageIcon
  },
  {
    title: 'Users',
    href: '/admin/users',
    color: "text-blue-500",
    icon: UsersIcon
  },
]

const route = useRoute()
const router = useRouter()

function logout() {
  router.push('/admin/login')
}
</script>

<template>
  <div class="flex min-h-screen bg-gray-100">
    <aside :style="{ width: '300px' }" class="flex flex-col px-3 py-4 bg-white">
      <div class="border-b p-7">
        <h2 class="font-pixel text-xl">Retro Store</h2>
      </div>
      <ul class="py-3 flex-1 space-y-2 px-2">
        <li @click="router.push(item.href)" :key="item.title" v-for="item in sidebarItems"
          :class="{ 'sidebar-item': true, 'bg-gray-100': route.name === item.title }">
          <div :class="[item.color]">
            <component :is="item.icon" />
          </div>
          <p class="text-sm">{{ item.title }}</p>
        </li>
      </ul>
      <button class="sidebar-item text-red-500" @click="logout">
        <LogoutIcon />
        <p class="text-sm">Logout</p>
      </button>
    </aside>
    <main class="flex-1">
      <nav class="bg-white py-6 flex items-center justify-between mb-5 shadow px-10">
        <h2 class="font-bold text-lg">{{ route.name }}</h2>
        <button class="font-semibold flex items-center space-x-2">
          <UserIcon />
          <span>User</span>
        </button>
      </nav>
      <div class="px-10">
        <RouterView />
      </div>
    </main>
  </div>
</template>

<style scoped>
.sidebar-item {
  @apply px-5 py-3 cursor-pointer hover:bg-gray-100 font-semibold flex items-center space-x-3 rounded-lg
}
</style>