<script setup lang="ts">
import AuthForm from '@/components/auth/AuthForm.vue'
import AuthInput from '@/components/auth/AuthInput.vue';
import { ref } from 'vue';
import { RouterLink } from 'vue-router';

const name = ref('')
const email = ref('')
const password = ref('')
const password_confirmation = ref('')
</script>

<template>
  <AuthForm>
    <template #title>Create an account</template>
    <template #default>
      <AuthInput label="Full name" name="name" type="text" v-model="name" />
      <AuthInput label="Email address" name="email" type="email" v-model="email" />
      <AuthInput label="Password" name="password" type="password" v-model="password" />
      <AuthInput label="Confirm password" name="password_confirmation" type="password" v-model="password_confirmation"
        class="mb-8" />
      <button type="submit" class="bg-emerald-500 text-white font-semibold w-full rounded-md py-2 mb-5">Sign up</button>
      <p class="text-sm text-gray-600 text-center">Already have an account? <RouterLink
          class="underline text-gray-700 font-semibold" to="/login">Sign in
        </RouterLink>
      </p>
    </template>
  </AuthForm>
</template>