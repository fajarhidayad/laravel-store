<script setup lang="ts">
import { onMounted } from 'vue';
import { RouterView } from 'vue-router';
import { getToken } from './api/token';

// onMounted(() => {
//   getToken()
// })
</script>

<template>
  <RouterView />
</template>
