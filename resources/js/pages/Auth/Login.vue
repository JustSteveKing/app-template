<script setup lang="ts">
import {Head, Link, useForm} from '@inertiajs/vue3';
import {Guest} from "@/layouts";
import {Button} from "@/components/ui/button";
import {Checkbox} from "@/components/ui/checkbox";
import {Input} from "@/components/ui/input";
import {Label} from "@/components/ui/label";

defineProps<{
  canResetPassword?: boolean;
  status?: string;
}>();

const form = useForm({
  email: '',
  password: '',
  remember: false,
});

const submit = async () => {
  form.post(route('login'), {
    onFinish: () => {
      form.reset('password');
    },
  });
};
</script>

<template>
  <Guest>
    <Head title="Sign into your account"/>

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
      {{ status }}
    </div>

    <div class="mx-auto grid w-[350px] gap-6">
      <div class="grid gap-2 text-left">
        <h1 class="text-3xl font-bold">
          Sign into your account
        </h1>
        <p class="text-balance text-muted-foreground">
          Enter your email and password below to login to your account
        </p>
      </div>
      <form @submit.prevent="submit" class="grid gap-4">
        <div class="grid gap-2">
          <Label for="email">Email</Label>
          <Input
            id="email"
            type="email"
            placeholder="jon.snow@thewall.io"
            v-model="form.email"
            required
          />
        </div>
        <div class="grid gap-2">
          <Label for="password">Password</Label>
          <Input
            id="password"
            type="password"
            placeholder="super-secret-password"
            v-model="form.password"
            required
          />
        </div>
        <div class="flex items-center gap-2">
          <Checkbox
            id="remember"
            v-model="form.remember"
          />
          <Label for="remember">Remember me</Label>
        </div>
        <Button variant="default" type="submit" class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
          Login
        </Button>
      </form>
      <div class="mt-4 text-left text-sm space-y-2">
        Don't have an account?
        <Link title="Create an account" :href="route('register')" class="underline">
          Sign up
        </Link>
        <Link
          :href="route('password.request')"
          title="Request a password reset"
          class="ml-auto inline-block text-sm underline"
        >
          Forgot your password?
        </Link>
      </div>
    </div>
  </Guest>
</template>
