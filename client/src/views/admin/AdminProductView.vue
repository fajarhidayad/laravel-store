<script setup lang="ts">
import PlusIcon from '@/components/icons/PlusIcon.vue';
import { useFetch } from '@/hooks/useFetch';

const { data: products } = useFetch('/products', { method: 'GET' })

</script>

<template>
  <div>
    <h1 class="text-2xl font-bold mb-2">All Products</h1>
    <div class="flex items-center justify-between mb-8">
      <p class="text-gray-500">A list of all the products.</p>
      <button class="flex items-center space-x-2 bg-emerald-500 text-white rounded-md px-3 py-2">
        <PlusIcon />
        <span>Add new product</span>
      </button>
    </div>
    <table class="teble-auto w-full">
      <thead>
        <tr class="text-left">
          <th>Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>Stock</th>
          <th>Status</th>
          <th>Category</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr :key="product.id" v-for="product in products" class="py-2">
          <td>{{ product.name }}</td>
          <td class="truncate max-w-20">{{ product.description }}</td>
          <td>{{ product.price }}</td>
          <td>{{ product.stock }}</td>
          <td>{{ product.status }}</td>
          <td>{{ product.category_id }}</td>
          <td class="flex items-center space-x-2 text-sm">
            <button class="bg-amber-500 text-white font-semibold px-4 py-2 rounded">Edit</button>
            <button class="bg-red-500 text-white font-semibold px-4 py-2 rounded">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
