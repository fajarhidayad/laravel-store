<script setup lang="ts">
import { useFetch } from '@/hooks/useFetch';
import type { Category } from '@/types/category';
import type { Product } from '@/types/product';
import Dropdown from 'primevue/dropdown';
import InputNumber from 'primevue/inputnumber';
import InputSwitch from 'primevue/inputswitch';
import InputText from 'primevue/inputtext';
import { reactive } from 'vue';

const props = defineProps<{ product: Product & { category: Category } }>()

const productForm = reactive({
  name: props.product.name,
  price: props.product.price,
  stock: props.product.stock,
  category: props.product.category,
  status: props.product.status ? true : false,
  image: props.product.image
})

const { data: categories } = useFetch<Category[]>('/categories', { method: 'GET' })

function submitForm() {
  console.log(productForm);
}
</script>

<template>
  <form @submit.prevent="submitForm">
    <div class="flex flex-col gap-2 mb-3">
      <label class="font-semibold" for="name">Name</label>
      <InputText id="name" v-model="productForm.name" />
    </div>
    <div class="flex flex-col gap-2 mb-3">
      <label class="font-semibold" for="price">Price</label>
      <InputNumber id="price" v-model="productForm.price" inputId="currency-indonesia" mode="currency" currency="IDR"
        locale="id-ID" />
    </div>
    <div class="flex flex-col gap-2 mb-3">
      <label class="font-semibold" for="stock">Stock</label>
      <InputNumber v-model="productForm.stock" />
    </div>
    <div class="flex flex-col gap-2 mb-3 max-w-[4rem]">
      <label class="font-semibold" for="stock">Category</label>
      <Dropdown v-model="productForm.category" optionLabel="name" :options="categories ? categories : []"
        placeholder="Select category" class="w-full md:w-[14rem]">
        <template #value="slotProps">
          <div v-if="slotProps.value" class="flex items-center">
            <div>{{ slotProps.value.name }}</div>
          </div>
          <span v-else>
            {{ slotProps.placeholder }}
          </span>
        </template>
      </Dropdown>
    </div>
    <div class="flex flex-col gap-2 mb-3 max-w-fit">
      <label class="font-semibold" for="stock">Status</label>
      <InputSwitch v-model="productForm.status" />
    </div>
    <div class="flex justify-end">
      <button class="bg-emerald-500 text-white px-4 py-2 font-semibold rounded">Save</button>
    </div>
  </form>
</template>
