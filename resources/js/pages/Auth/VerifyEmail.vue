<script setup lang="ts">
import {computed} from 'vue';
import GuestLayout from '@/layouts/GuestLayout.vue';
import PrimaryButton from '@/components/PrimaryButton.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import {Guest} from "@/layouts";
import {Button} from "@/components/ui/button";

const props = defineProps<{
  status?: string;
}>();

const form = useForm({});

const submit = async () => {
  form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
  <Guest>
    <Head title="Verify your email address"/>

    <div class="mx-auto grid w-[350px] gap-6">
      <div class="grid gap-2 text-left">
        <h1 class="text-3xl font-bold">
          Sign into your account
        </h1>
        <p class="text-balance text-muted-foreground">
          Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we
          just emailed to you? If you didn't receive the email, we will gladly send you another.
        </p>
        <p class="mb-4 text-balance text-muted-foreground" v-if="verificationLinkSent">
          A new verification link has been sent to the email address you provided during registration.
        </p>
      </div>
      <form @submit.prevent="submit" class="grid gap-4">
        <Button variant="default" type="submit" class="w-full" :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing">
          Resend Verification Email
        </Button>
          <Link
            :href="route('logout')"
            method="post"
            as="button"
            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
          >Log Out
          </Link>
      </form>
    </div>
  </Guest>
  <!--  <GuestLayout>-->
  <!--    <Head title="Email Verification"/>-->

  <!--    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">-->
  <!--      Thanks for signing up! Before getting started, could you verify your email address by clicking on the link-->
  <!--      we just emailed to you? If you didn't receive the email, we will gladly send you another.-->
  <!--    </div>-->

  <!--    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400" v-if="verificationLinkSent">-->
  <!--      A new verification link has been sent to the email address you provided during registration.-->
  <!--    </div>-->

  <!--    <form @submit.prevent="submit">-->
  <!--      <div class="mt-4 flex items-center justify-between">-->
  <!--        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">-->
  <!--          Resend Verification Email-->
  <!--        </PrimaryButton>-->

  <!--        <Link-->
  <!--          :href="route('logout')"-->
  <!--          method="post"-->
  <!--          as="button"-->
  <!--          class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"-->
  <!--        >Log Out-->
  <!--        </Link-->
  <!--        >-->
  <!--      </div>-->
  <!--    </form>-->
  <!--  </GuestLayout>-->
</template>
