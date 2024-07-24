<script setup lang="ts">
import PencilIcon from '@/components/icons/PencilIcon.vue';
import PlusIcon from '@/components/icons/PlusIcon.vue';
import TrashIcon from '@/components/icons/TrashIcon.vue';
import { useFetch } from '@/hooks/useFetch';
import type { Product } from '@/types/product';
import Column from 'primevue/column';
import DataTable from 'primevue/datatable';
import Dialog from 'primevue/dialog';
import { ref } from 'vue';
import EditProductForm from './product/EditProductForm.vue';

const { data: products } = useFetch<Product[]>('/products', { method: 'GET' })
const editModal = ref(false);

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
    <DataTable :value="products" tableStyle="width: 'full'">
      <template #empty>
        <p class="text-center font-semibold text-gray-600">No products found.</p>
      </template>
      <Column field="name" header="Name" sortable></Column>
      <Column field="image" header="Image">
        <template #body="slotProps">
          <img :src="`http://localhost:8000/storage/${slotProps.data.image}`" class="w-[6rem] shadow rounded" />
        </template>
      </Column>
      <Column field="price" header="Price" sortable></Column>
      <Column field="stock" header="Stock" sortable></Column>
      <Column field="category" header="Category" sortable>
        <template #body="slotProps">
          {{ slotProps.data.category.name }}
        </template>
      </Column>
      <Column header="Status">
        <template #body="slotProps">
          <div class="text-sm font-medium text-center">
            <p v-if="slotProps.data.status" class="bg-green-100 p-1 text-green-500 w-fit rounded">active</p>
            <p v-else class="bg-red-100 rounded p-1 text-red-500 w-fit">not active</p>
          </div>
        </template>
      </Column>
      <Column header="Action">
        <template #body="slotProps">
          <div class="flex space-x-2">
            <button class="bg-amber-500 text-white p-2 rounded-lg" @click="editModal = true">
              <PencilIcon :size="20" />
            </button>
            <Dialog v-model:visible="editModal" modal header="Edit Product" style="max-width: 35rem;">
              <EditProductForm :product="slotProps.data" />
            </Dialog>
            <button class="bg-red-500 text-white p-2 rounded-lg">
              <TrashIcon :size="20" />
            </button>
          </div>
        </template>
      </Column>
    </DataTable>
  </div>
</template>
