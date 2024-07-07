<script setup lang="ts">
import NavBar from '../components/NavBar.vue'
</script>

<template>
  <NavBar />
  <main class="bg-gray-100 min-h-screen">
    <slot />
  </main>
</template>


<style scoped></style>