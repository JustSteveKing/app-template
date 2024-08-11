<script setup lang="ts">
import {useForm, usePage} from '@inertiajs/vue3';
import {Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle} from "@/components/ui/card";
import {Button} from "@/components/ui/button";
import {Input} from "@/components/ui/input";
import {Label} from "@/components/ui/label";

defineProps<{
  mustVerifyEmail?: Boolean;
  status?: String;
}>();

const user = usePage().props.auth.user;

const form = useForm({
  name: user.name,
  email: user.email,
});

const submit = async () => {
  form.patch(route('profile.update'))
};
</script>

<template>
  <Card>
    <CardHeader>
      <CardTitle>
        Profile Information
      </CardTitle>
      <CardDescription>
        Update your account's profile information and email address.
      </CardDescription>
    </CardHeader>
    <form @submit.prevent="submit" class="grid gap-4">
      <CardContent>
        <div class="grid gap-2">
          <Label for="name">Name</Label>
          <Input
            id="name"
            type="text"
            placeholder="Jon Snow"
            v-model="form.name"
            required
          />
        </div>
        <div class="grid gap-2">
          <Label for="email">Email Address</Label>
          <Input
            id="email"
            type="email"
            placeholder="jon.snow@thewall.io"
            v-model="form.email"
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
