<script setup lang="ts">
const props = defineProps<{ type: string; name: string; label: string }>()
const model = defineModel()
</script>

<template>
  <div class="flex flex-col space-y-2 mb-4">
    <label :for="props.name" class="text-sm">
      {{ props.label }}
    </label>
    <input :type="props.type" :name="props.name" v-model="model"
      class="border px-4 py-2 focus:outline-emerald-500 rounded-md w-full" />
  </div>
</template>