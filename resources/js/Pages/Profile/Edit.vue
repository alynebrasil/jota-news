<template>
    <AuthenticatedLayout>
      <template #header>
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
          Meu Perfil
        </h2>
      </template>
  
      <div class="py-12">
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
          <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
            <h3 class="text-lg font-medium">Informações do Usuário</h3>
            <div class="mt-4">
              <p><strong>Nome:</strong> {{ name }}</p>
              <p><strong>Email:</strong> {{ email }}</p>
            </div>
            <div class="mt-6">
              <UpdatePasswordForm />
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  </template>
  
  <script setup>
  import { defineProps } from 'vue';
  import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
  
  const props = defineProps({
    name: String,
    email: String,
  });
  </script>
  