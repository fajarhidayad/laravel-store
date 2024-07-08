<script setup lang="ts">
import { RouterLink } from 'vue-router';

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
    <h2 class="text-2xl font-bold mb-7">Product by Category</h2>
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