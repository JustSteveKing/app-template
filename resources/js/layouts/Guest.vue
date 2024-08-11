<script setup lang="ts">

</script>

<template>
  <div class="w-full lg:grid lg:min-h-screen lg:grid-cols-2 xl:min-h-screen">
    <div class="hidden bg-muted lg:block">
      <img
        src="https://www.shadcn-vue.com/placeholder.svg"
        alt="Image"
        width="1920"
        height="1080"
        class="h-full w-full object-cover dark:brightness-[0.2] dark:grayscale"
      >
    </div>
    <div class="flex items-center justify-center py-12">
      <slot />
    </div>
  </div>
</template>
