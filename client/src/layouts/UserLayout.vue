<script setup lang="ts">
import { RouterView } from 'vue-router';
import NavBar from '../components/NavBar.vue'
import TheFooter from '@/components/TheFooter.vue';
</script>

<template>
  <div class="min-h-screen flex flex-col">
    <NavBar />
    <main class="bg-gray-100 flex-1 pb-10">
      <RouterView />
    </main>
    <TheFooter />
  </div>
</template>


<style scoped></style>