<script setup lang="ts">
import { ref } from 'vue';
import { RouterLink } from 'vue-router';

const email = ref('')
const password = ref('')

function onSUbmitForm() {
  console.log(email.value, password.value);

}
</script>

<template>
  <div class="min-h-screen bg-gray-900 flex flex-col justify-center">
    <main class="h-full">
      <section class="bg-white rounded-lg px-6 py-10 shadow max-w-lg mx-auto">
        <h1 class="text-2xl font-bold text-center text-slate-700 mb-5">Admin Panel</h1>
        <form @submit.prevent="onSUbmitForm">
          <div class="flex flex-col space-y-3 mb-3">
            <label for="email" class="font-semibold text-sm">Email address</label>
            <input type="email" name="email" id="email" class="border py-2 px-3 rounded" v-model="email">
          </div>
          <div class="flex flex-col space-y-3 mb-7">
            <label for="password" class="font-semibold text-sm">Password</label>
            <input type="password" name="password" id="password" class="border py-2 px-3 rounded" v-model="password">
          </div>

          <button class="bg-gray-800 text-white rounded font-semibold py-2 w-full">Sign In</button>
        </form>
      </section>
    </main>
  </div>
</template>