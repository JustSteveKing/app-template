<script setup lang="ts">
import {Head, useForm} from '@inertiajs/vue3';
import {Button} from "@/components/ui/button";
import {Guest} from "@/layouts";
import {Input} from "@/components/ui/input";
import {Label} from "@/components/ui/label";

defineProps<{
  status?: string;
}>();

const form = useForm({
  email: '',
});

const submit = async () => {
  form.post(route('password.email'));
};
</script>

<template>
  <Guest>
    <Head title="Forgot your password"/>

    <div class="mx-auto grid w-[350px] gap-6">
      <div class="grid gap-2 text-left">
        <h1 class="text-3xl font-bold">
          Forgot your password
        </h1>
        <p class="text-balance text-muted-foreground">
          Forgot your password? No problem. Just let us know your email address and we will email you a password reset
          link that will allow you to choose a new one.
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
        <Button variant="default" type="submit" class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
          Email Password Reset Link
        </Button>
      </form>
    </div>
  </Guest>
</template>
