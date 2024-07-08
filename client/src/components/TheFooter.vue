<script setup lang="ts">
import { RouterLink } from 'vue-router';


</script>

<template>
  <footer class="border-t border-t-gray-200">
    <section class="py-10 grid grid-cols-12 gap-x-4 container">
      <h2 class="font-bold text-gray-600 font-pixel">Retro Store</h2>
      <div class="col-span-2 text-sm text-gray-500 flex flex-col">
        <h3 class="font-semibold text-gray-800 mb-3 text-base">Products</h3>
        <RouterLink to="/" class="link">Console</RouterLink>
        <RouterLink to="/" class="link">PC</RouterLink>
        <RouterLink to="/" class="link">Controllers</RouterLink>
        <RouterLink to="/" class="link">Games</RouterLink>
      </div>
      <div class="col-span-2 text-sm text-gray-500">
        <h3 class="font-semibold text-gray-800 mb-3 text-base">About</h3>
        <RouterLink to="/" class="link">About Us</RouterLink>
      </div>
      <div class="col-span-2 text-sm text-gray-500">
        <h3 class="font-semibold text-gray-800 mb-3 text-base">Customer Service</h3>
        <RouterLink to="/" class="link">FAQ</RouterLink>
      </div>
    </section>

    <section class="py-5 border-t border-t-gray-100 text-center">
      <p class="text-gray-500 text-sm">&copy; 2024 Retro Store, Inc. All rights reserved.</p>
    </section>
  </footer>
</template>

<style lang="css" scoped>
.link {
  @apply hover:underline mb-3
}
</style>