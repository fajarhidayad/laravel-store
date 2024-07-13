<script setup lang="ts">
import { useRouter } from 'vue-router';

const router = useRouter()
</script>

<template>
  <main class="min-h-screen flex flex-col items-center justify-center">
    <h1 class="text-4xl font-bold mb-5">404 Page Not Found</h1>
    <button @click="router.go(-1)" class="bg-gray-800 text-white font-semibold rounded-lg px-5 py-2">Return</button>
  </main>
</template>