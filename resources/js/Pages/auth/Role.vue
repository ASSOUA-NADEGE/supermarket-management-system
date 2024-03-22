<template>
    <div class="flex flex-col h-screen w-screen">
        <h3>Welcome to the Supermarket</h3>
        <div class="grow grid place-content-center">
            <div class="grid grid-cols-3 gap-4">
                <a
                    class="rounded border border-black flex items-center justify-center size-40 cursor-pointer hover:shadow hover:shadow-gray-400"
                    v-for="user in $props.users"
                    v-text="user.name"
                    @click="
                        [
                            (currentUser = user),
                            (showPassword = true),
                            debounce(
                                () =>
                                    (
                                        $refs.passwordInputRef as HTMLInputElement
                                    ).focus(),

                                1000,
                            ),
                        ]
                    "
                ></a>
            </div>
        </div>
    </div>

    <Modal
        :show="showPassword"
        closeable
        @close="[(showPassword = false), (password = '')]"
        class="text-center"
    >
        <div class="p-2 flex flex-col">
            Please Enter your password for {{ currentUser.name }}
            <TextInput
                type="password"
                v-model="password"
                @keyup.enter="handleLogin"
                ref="passwordInputRef"
            />
        </div>
    </Modal>
</template>

<script setup lang="ts">
import { reactive, ref } from "vue";
import { router } from "@inertiajs/vue3";
import { debounce } from "lodash";
import Modal from "../../Components/Breeze/Modal.vue";
import TextInput from "../../Components/Breeze/TextInput.vue";

defineProps<{ users: Record<string, any> }>();
const showPassword = ref(false);
const currentUser = reactive({});
const password = ref("");

const handleLogin = () => {
    console.error("wobey");
    if (password.value !== currentUser.password) return;

    router.visit("home");
};
</script>

<style></style>
