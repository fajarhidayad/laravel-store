<script setup lang="ts">
import { useFetch } from '@/hooks/useFetch';
import { RouterLink } from 'vue-router';
import type { Product } from '@/types/product';
import type { Category } from '@/types/category';

const { data: products } = useFetch<Product[]>('/products/latest', { method: 'GET' });
const { data: categories } = useFetch<Category[]>('/categories', { method: 'GET' });

</script>

<template>
  <section class="hero flex flex-col items-center justify-center text-white text-center">
    <h1 class="text-5xl font-bold mb-5">Welcome to the Retro Gaming Store</h1>
    <p class="mb-8 max-w-3xl text-xl font-extralight">Rediscover the magic of gaming’s past and
      start your journey today with a console that brings the best of yesterday into your hands.</p>
    <RouterLink to="/products" class="bg-white rounded-lg px-10 py-3 text-slate-800 text-lg">
      Check Our Latest Products
    </RouterLink>
  </section>

  <section class="py-14 container">
    <div class="flex items-center justify-between">

      <h2 class="text-2xl font-bold mb-7">Latest Products</h2>
      <RouterLink to="/categories" class="text-emerald-500 hover:text-emerald-600">Browse latest products &rarr;
      </RouterLink>
    </div>
    <ul class="grid grid-cols-5 gap-5">
      <li class="bg-white rounded-lg p-5 shadow-md" v-for="product in products" :key="product.id">
        {{ product.name }}
      </li>
    </ul>
  </section>

  <section class="py-14 container">
    <div class="flex justify-between items-center">
      <h2 class="text-2xl font-bold mb-7">Product by Category</h2>
      <RouterLink to="/categories" class="text-emerald-500 hover:text-emerald-600">Browse all categories &rarr;
      </RouterLink>
    </div>
    <ul class="grid grid-cols-5 gap-x-5">
      <li v-for="category in categories" :key="category.id"
        class="rounded-lg p-5 bg-gradient-to-b from-transparent to-black/10">
        <h3 class="text-xl font-bold text-white">{{ category.name }}</h3>
      </li>
    </ul>
  </section>

  <section
    class="container text-white rounded-lg explore-section flex flex-col justify-center items-center text-center">
    <h1 class="font-bold text-4xl mb-5">Collect Retro Console</h1>
    <p class="max-w-2xl text-xl font-extralight mb-8">From the legendary Nintendo Entertainment System (NES) that
      brought
      iconic
      characters to
      life, to the revolutionary Sega Genesis that redefined 16-bit gaming, our carefully curated inventory features
      consoles that
      shaped an era</p>
    <button class="px-10 py-3 bg-white rounded-lg text-slate-800 font-semibold">Explore</button>
  </section>
</template>

<style scoped>
.hero {
  height: 70vh;
  background-image: linear-gradient(to bottom, rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url('https://images.unsplash.com/photo-1635514569146-9a9607ecf303?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
  background-size: cover;
  background-position: center;
}

.explore-section {
  height: 40vh;
  background-image: linear-gradient(to bottom, rgba(0, 0, 0, .7), rgba(0, 0, 0, .7)), url('https://images.unsplash.com/photo-1555864326-5cf22ef123cf?q=80&w=1734&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
  background-size: cover;
  background-position: center;
}
</style>