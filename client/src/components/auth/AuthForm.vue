<script setup lang="ts">
const emit = defineEmits(['@submitForm'])
</script>

<template>
  <div class="container pt-10">
    <h1 class="text-center font-bold text-gray-800 text-2xl mb-8">
      <slot name="title" />
    </h1>
    <form @submit.prevent="emit('@submitForm')" class="bg-white px-8 py-10 rounded-lg max-w-lg mx-auto shadow">
      <slot />
    </form>
  </div>
</template>