<script setup lang="ts">
import AuthForm from '@/components/auth/AuthForm.vue';
import AuthInput from '@/components/auth/AuthInput.vue';
import { ref } from 'vue';

const email = ref('')
const password = ref('')

function onSubmitForm() {
  console.log(email, password);
}
</script>

<template>
  <AuthForm @@submit-form="onSubmitForm">
    <template #title>Create an account</template>
    <template #default>
      <AuthInput label="Email address" name="email" type="email" v-model="email" />
      <AuthInput label="Password" name="password" type="password" v-model="password" class="mb-8" />
      <button type="submit" class="bg-emerald-500 text-white font-semibold w-full rounded-md py-2 mb-5">Sign in</button>
      <p class="text-sm text-gray-600 text-center">Don't have an account? <RouterLink
          class="underline text-gray-700 font-semibold" to="/register">Sign up
        </RouterLink>
      </p>
    </template>
  </AuthForm>
</template>