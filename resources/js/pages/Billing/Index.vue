<script setup lang="ts">
import { BanknoteIcon } from 'lucide-vue-next'
import { Alert, AlertDescription, AlertTitle } from '@/components/ui/alert'
import {App} from "@/layouts";
import {usePage} from "@inertiajs/vue3";
import {computed} from "vue";

const page = usePage();

const subscription = computed(() => page.props.auth.user.subscription);
const plans = computed(() => page.props.app.plans);
</script>

<template>
  <App>
    <div>
      <Alert>
        <BanknoteIcon class="h-4 w-4" />
        <AlertTitle>{{ subscription.trial ? subscription.plan?.nickname : 'On Trial' }}</AlertTitle>
        <AlertDescription>
          You are currently on a free trial.
        </AlertDescription>
      </Alert>
    </div>
    <div>
      <ul>
        <li v-for="plan in plans" :key="plan.name">
          {{plan.name}}
        </li>
      </ul>
    </div>
  </App>
</template>
