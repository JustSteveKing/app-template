<script setup lang="ts">
import {useForm} from '@inertiajs/vue3';
import {ref} from 'vue';
import {Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle} from "@/components/ui/card";
import {Button} from "@/components/ui/button";
import {Input} from "@/components/ui/input";
import {Label} from "@/components/ui/label";

const passwordInput = ref<HTMLInputElement | null>(null);
const currentPasswordInput = ref<HTMLInputElement | null>(null);

const form = useForm({
  current_password: '',
  password: '',
  password_confirmation: '',
});

const updatePassword = async () => {
  form.put(route('password.update'), {
    preserveScroll: true,
    onSuccess: () => {
      form.reset();
    },
    onError: () => {
      if (form.errors.password) {
        form.reset('password', 'password_confirmation');
        passwordInput.value?.focus();
      }
      if (form.errors.current_password) {
        form.reset('current_password');
        currentPasswordInput.value?.focus();
      }
    },
  });
};
</script>

<template>
  <Card>
    <CardHeader>
      <CardTitle>
        Update your password
      </CardTitle>
      <CardDescription>
        Ensure your account is using a long, random password to stay secure
      </CardDescription>
    </CardHeader>
    <form @submit.prevent="updatePassword">
      <CardContent class="grid gap-4">
        <div class="grid gap-2">
          <Label for="current_password">Current Password</Label>
          <Input
            id="current_password"
            type="password"
            placeholder="super-secret-password"
            v-model="form.current_password"
            required
          />
        </div>
        <div class="grid gap-2">
          <Label for="password">New Password</Label>
          <Input
            id="password"
            type="password"
            placeholder="super-secret-password"
            v-model="form.password"
            required
          />
        </div>
        <div class="grid gap-2">
          <Label for="password_confirmation">Confirm New Password</Label>
          <Input
            id="password_confirmation"
            type="password"
            placeholder="super-secret-password"
            v-model="form.password_confirmation"
            required
          />
        </div>
      </CardContent>
      <CardFooter>
        <Button variant="default" type="submit" class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
          Update
        </Button>
      </CardFooter>
    </form>
  </Card>
</template>
