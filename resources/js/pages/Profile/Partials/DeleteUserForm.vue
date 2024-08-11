<script setup lang="ts">
import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogFooter,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from '@/components/ui/dialog'
import {useForm} from '@inertiajs/vue3';
import {nextTick, ref} from 'vue';
import {Card, CardDescription, CardFooter, CardHeader, CardTitle} from "@/components/ui/card";
import {Button} from "@/components/ui/button";
import {Label} from "@/components/ui/label";
import {Input} from "@/components/ui/input";

const confirmingUserDeletion = ref(false);
const passwordInput = ref<HTMLInputElement | null>(null);

const form = useForm({
  password: '',
});

const confirmUserDeletion = () => {
  confirmingUserDeletion.value = true;

  nextTick(() => passwordInput.value?.focus());
};

const deleteUser = async () => {
  form.delete(route('profile.destroy'), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
    onError: () => passwordInput.value?.focus(),
    onFinish: () => {
      form.reset();
    },
  });
};

const closeModal = () => {
  confirmingUserDeletion.value = false;

  form.reset();
};
</script>

<template>
  <section>
    <Card>
      <CardHeader>
        <CardTitle>
          Delete Account
        </CardTitle>
        <CardDescription>
          Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
        </CardDescription>
      </CardHeader>
      <CardFooter>
        <Dialog :show="confirmingUserDeletion" @close="closeModal">
          <DialogTrigger as-child>
            <Button variant="destructive" @click="confirmUserDeletion">
              Delete Account
            </Button>
          </DialogTrigger>
          <DialogContent class="sm:max-w-2xl">
            <form>
              <DialogHeader>
                <DialogTitle>Are you sure you want to delete your account?</DialogTitle>
                <DialogDescription>
                  Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
                </DialogDescription>
              </DialogHeader>
              <div class="grid gap-2 py-6 space-y-4">
                  <Label for="password">Password</Label>
                  <Input
                    id="password"
                    type="password"
                    class="w-full"
                    placeholder="super-secret-password"
                    v-model="form.password"
                    required
                  />
                </div>
              <DialogFooter>
                <Button variant="destructive" class="w-full" type="submit" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                  Save changes
                </Button>
              </DialogFooter>
            </form>
          </DialogContent>
        </Dialog>
      </CardFooter>
    </Card>
  </section>
<!--  <section class="space-y-6">-->

<!--    <DangerButton @click="confirmUserDeletion">Delete Account</DangerButton>-->

<!--    <Modal :show="confirmingUserDeletion" @close="closeModal">-->
<!--      <div class="p-6">-->
<!--        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">-->
<!--          Are you sure you want to delete your account?-->
<!--        </h2>-->

<!--        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">-->
<!--          Once your account is deleted, all of its resources and data will be permanently deleted. Please-->
<!--          enter your password to confirm you would like to permanently delete your account.-->
<!--        </p>-->

<!--        <div class="mt-6">-->
<!--          <InputLabel for="password" value="Password" class="sr-only"/>-->

<!--          <TextInput-->
<!--            id="password"-->
<!--            ref="passwordInput"-->
<!--            v-model="form.password"-->
<!--            type="password"-->
<!--            class="mt-1 block w-3/4"-->
<!--            placeholder="Password"-->
<!--            @keyup.enter="deleteUser"-->
<!--          />-->

<!--          <InputError :message="form.errors.password" class="mt-2"/>-->
<!--        </div>-->

<!--        <div class="mt-6 flex justify-end">-->
<!--          <SecondaryButton @click="closeModal"> Cancel</SecondaryButton>-->

<!--          <DangerButton-->
<!--            class="ms-3"-->
<!--            :class="{ 'opacity-25': form.processing }"-->
<!--            :disabled="form.processing"-->
<!--            @click="deleteUser"-->
<!--          >-->
<!--            Delete Account-->
<!--          </DangerButton>-->
<!--        </div>-->
<!--      </div>-->
<!--    </Modal>-->
<!--  </section>-->
</template>
