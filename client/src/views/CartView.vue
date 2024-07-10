<script setup lang="ts">

</script>

<template>
  <div class="py-10 container max-w-7xl">
    <h1 class="text-3xl font-bold text-gray-800 mb-5">Shopping Cart</h1>
    <div class="grid grid-cols-3 gap-x-10">
      <ul class="col-span-2 bg-white rounded p-5 self-start">
        <li class="flex py-5 border-b last:border-b-0">
          <figure class="bg-gray-200 rounded w-20 h-20 mr-5"></figure>
          <div class="flex flex-col justify-between">
            <h3 class="font-semibold text-lg">Title</h3>
            <p>Rp 180.000</p>
          </div>

        </li>
        <li class="flex py-5 border-b last:border-b-0">
          <figure class="bg-gray-200 rounded w-20 h-20 mr-5"></figure>
          <div class="flex flex-col justify-between">
            <h3 class="font-semibold text-lg">Title</h3>
            <p>Rp 180.000</p>
          </div>

        </li>
      </ul>
      <section class="rounded bg-white p-5">
        <h3 class="font-semibold text-xl mb-3">Order summary (0 items)</h3>
        <ul class="mb-5">
          <li class="flex items-center justify-between text-sm py-3 border-b last:border-b-0">
            <p>Subtotal</p>
            <p>Rp 200.000</p>
          </li>
          <li class="flex items-center justify-between text-sm py-3 border-b last:border-b-0">
            <p>Shipping</p>
            <p>Rp 19.000</p>
          </li>
          <li class="flex items-center justify-between text-sm py-3 border-b last:border-b-0">
            <p>Discount</p>
            <p>Rp 10.000</p>
          </li>
          <li class="flex items-center justify-between text-sm py-3 border-b last:border-b-0 font-semibold">
            <p>Order total</p>
            <p>Rp 209.000</p>
          </li>
        </ul>
        <button class="text-lg rounded-lg py-2 bg-emerald-500 text-white w-full">Checkout</button>
      </section>
    </div>
  </div>
</template>
