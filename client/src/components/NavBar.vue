<script setup lang="ts">
import { RouterLink } from 'vue-router';
import CartIcon from './icons/CartIcon.vue';
import SearchIcon from './icons/SearchIcon.vue';

</script>

<template>
  <nav class="bg-white shadow-md">
    <div class="bg-emerald-900 py-2 text-white">
      <div class="container flex items-center text-sm justify-end space-x-5">
        <RouterLink class="hover:underline" to="/login">Sign in</RouterLink>
        <RouterLink class="hover:underline" to="/register">Create an account</RouterLink>
      </div>
    </div>
    <div class="py-5 container flex items-center justify-between">
      <RouterLink to="/" class="text-lg font-bold font-pixel">Retro Store</RouterLink>

      <div class="flex items-center space-x-5">
        <div class="rounded-md border px-3 py-2 flex space-x-3">
          <label for="search">
            <SearchIcon class="text-gray-500" />
          </label>
          <input type="text" name="search" class="focus:outline-none" placeholder="Search" />
        </div>

        <RouterLink to="/cart" class="flex items-center justify-center text-slate-500 hover:text-slate-700 space-x-2">
          <CartIcon />
          <span>0</span>
        </RouterLink>
      </div>
    </div>
  </nav>
</template>
