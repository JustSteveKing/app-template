<script setup lang="ts">
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import {Head} from '@inertiajs/vue3';
import {App} from "@/layouts";

defineProps<{
  mustVerifyEmail?: boolean;
  status?: string;
}>();
</script>

<template>
  <Head title="Profile"/>

  <App>
    <main class="space-y-12 py-6 px-4">
      <UpdateProfileInformationForm
        :must-verify-email="mustVerifyEmail"
        :status="status"
        class="w-full"
      />

      <UpdatePasswordForm class="w-full"/>

      <DeleteUserForm class="w-full"/>
    </main>
  </App>
</template>
