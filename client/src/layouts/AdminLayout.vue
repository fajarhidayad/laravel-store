<script setup lang="ts">
import DashboardIcon from '@/components/icons/DashboardIcon.vue';
import PackageIcon from '@/components/icons/PackageIcon.vue';
import UserIcon from '@/components/icons/UserIcon.vue';
import { RouterLink, RouterView, useRoute, useRouter } from 'vue-router'

const sidebarItems = [
  {
    title: 'Dashboard',
    href: '/admin/dashboard',
    color: "text-emerald-500",
    icon: DashboardIcon
  },
  {
    title: 'Products',
    href: '/admin/products',
    color: "text-blue-500",
    icon: PackageIcon
  },

]

const route = useRoute()
const router = useRouter()
</script>

<template>
  <div class="flex min-h-screen bg-gray-200">
    <aside class="w-[300px] flex flex-col px-3 py-4">
      <section class="bg-white h-full rounded-3xl shadow">
        <div class="border-b p-7">
          <h2 class="font-pixel text-xl text-center">Retro Store</h2>
        </div>
        <ul class="py-3 flex-1 space-y-3 px-2">
          <li @click="router.push(item.href)" :key="item.title" v-for="item in sidebarItems"
            :class="{ 'px-5 py-3 cursor-pointer hover:bg-gray-100 font-semibold flex items-center space-x-3 rounded-lg': true, 'bg-gray-100': route.name === item.title }">
            <div :class="[item.color]">
              <component :is="item.icon" />
            </div>
            <p class="text-sm">{{ item.title }}</p>
          </li>
        </ul>
      </section>
    </aside>
    <main class="px-5 flex-1">
      <nav class="py-4 flex items-center justify-between mb-5">
        <h2 class="font-bold">{{ route.name }}</h2>
        <button class="font-semibold flex items-center space-x-2">
          <UserIcon />
          <span>User</span>
        </button>
      </nav>
      <RouterView />
    </main>
  </div>
</template>