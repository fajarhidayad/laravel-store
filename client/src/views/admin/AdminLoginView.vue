<script setup lang="ts">
import { api } from "@/api/api";
import axios from "axios";
import { ref, reactive } from "vue";

const formData = reactive({
  email: '',
  password: ''
});
const errorMessage = ref("");

function onSubmitForm() {
  if (!formData.email || !formData.password) {
    errorMessage.value = "All field is required";
    return;
  }
  axios
    .get("http://localhost:8000/sanctum/csrf-cookie")
    .then(() => {
      api
        .post("/admin/login", { email: formData.email, password: formData.password })
        .then((res) => {
          console.log(res.data);
        })
        .catch((err) => {
          errorMessage.value = err.response.data.message
          // console.log(err.response.data.message);
        });
    })
    .catch((err) => console.error(err.response));
}
</script>

<template>
  <div class="min-h-screen bg-gray-900 flex flex-col justify-center">
    <main class="h-full">
      <section class="bg-white rounded-lg px-6 py-10 shadow max-w-lg mx-auto">
        <h1 class="text-2xl font-bold text-center text-slate-700 mb-5">Admin Panel</h1>
        <form @submit.prevent="onSubmitForm">
          <div class="flex flex-col space-y-3 mb-3">
            <label for="email" class="font-semibold text-sm">Email address</label>
            <input type="email" name="email" id="email" class="border py-2 px-3 rounded" v-model="formData.email" />
          </div>
          <div class="flex flex-col space-y-3 mb-3">
            <label for="password" class="font-semibold text-sm">Password</label>
            <input type="password" name="password" id="password" class="border py-2 px-3 rounded"
              v-model="formData.password" />
          </div>

          <p class="text-red-500 mb-5">{{ errorMessage }}</p>

          <button class="bg-gray-800 text-white rounded font-semibold py-2 w-full">
            Sign In
          </button>
        </form>
      </section>
    </main>
  </div>
</template>
