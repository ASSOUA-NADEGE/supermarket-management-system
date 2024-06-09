<template>
    <div class="">
        <h1 class="text-center">Select User</h1>
        <ul class="text-center text-red-600">
            <InlineMessage severity="error" v-for="error in $page.props.errors">{{error}}</InlineMessage>
        </ul>
        <div class="flex items-center justify-center gap-4">
            <AuthCard
                class=""
                v-for="user in $props.users"
                @click="
                    [
                        (currentUser = user),
                        (form.email = user.email),
                        (showPassword = true),
                    ]
                "
            >
                {{ user.name }}
            </AuthCard>
        </div>
    </div>
    <Dialog v-model:visible="showPassword" modal :base-z-index="100" @show="">
        <template #header>
            <h3 class="capitalize">{{ currentUser.name }}</h3>
        </template>
        <template #default>
            <div class="grid gap-2">
                <label for="password">Password</label>
                <TextInput
                    id="password"
                    type="password"
                    v-model="form.password"
                    @keyup.enter="handleLogin"
                    autofocus
                />
                <small id="password-help">Enter your password.</small>
            </div>
        </template>
        <template #footer>
            <Button
                label="Cancel"
                text
                severity="secondary"
                outlined
                @click="[(showPassword = false), (password = '')]"
            />
            <Button @click="handleLogin" label="Login" outlined autofocus />
        </template>
    </Dialog>
</template>

<script setup lang="ts">
import { reactive, ref, watch } from "vue";
import { router, useForm } from "@inertiajs/vue3";
import { debounce } from "lodash";
import InlineMessage from 'primevue/inlinemessage';

import AuthLayout from "@/Layouts/AuthLayout.vue";
import AuthCard from "@/Components/AuthCard.vue";
import Button from "primevue/button";
import TextInput from "primevue/inputtext";
import Dialog from "primevue/dialog";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";

defineOptions({
    layout: [DefaultLayout, AuthLayout],
});

const visible = ref(true);
const props = defineProps<{ users: Record<string, any> }>();
const showPassword = ref(false);
const currentUser = reactive({});

const form = useForm({
    email: "",
    password: "",
});

const handleLogin = () => {
    if (form.password.value === "") return;

    form.post("/auth", {});
};
</script>

<style></style>
