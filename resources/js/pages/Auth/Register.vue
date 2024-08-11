<script setup lang="ts">
import {Head, Link, useForm} from '@inertiajs/vue3';
import {Guest} from "@/layouts";
import {Button} from "@/components/ui/button";
import {Input} from "@/components/ui/input";
import {Label} from "@/components/ui/label";

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
});

const submit = async() => {
  form.post(route('register'), {
    onFinish: () => {
      form.reset('password', 'password_confirmation');
    },
  });
};
</script>

<template>
  <Guest>
    <Head title="Create an account"/>

    <div class="mx-auto grid w-[350px] gap-6">
      <div class="grid gap-2 text-left">
        <h1 class="text-3xl font-bold">
          Create an account
        </h1>
        <p class="text-balance text-muted-foreground">
          Enter your details below to create a new account.
        </p>
      </div>
      <form @submit.prevent="submit" class="grid gap-4">
        <div class="grid gap-2">
          <Label for="name">Name</Label>
          <Input
            id="name"
            type="text"
            placeholder="Jon Snow"
            v-model="form.name"
            required
            autofocus
          />
        </div>
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
        <div class="grid gap-2">
          <Label for="password_confirmation">Confirm Password</Label>
          <Input
            id="password_confirmation"
            type="password"
            placeholder="super-secret-password"
            v-model="form.password_confirmation"
            required
          />
        </div>
        <Button variant="default" type="submit" class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
          Register
        </Button>
      </form>
      <div class="mt-4 text-left text-sm space-y-2">
        Already signed up?
        <Link title="Sign into your account" :href="route('login')" class="underline">
          Sign into your account
        </Link>
      </div>
    </div>
  </Guest>
</template>
