<template>
    <div class="">
        <h1 class="text-center">Select User</h1>
        <div class="flex items-center justify-center gap-4">
            <Card
                class=""
                v-for="user in $props.users"
                @click="
                        [
                            (currentUser = user),
                            (form.email = user.email),
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
            >
                <template #content>
                    {{ user.name }}
                </template>
            </Card>
        </div>
    </div>
    <Dialog v-model:visible="showPassword" modal :base-z-index="100">
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
                    ref="passwordInputRef"
                />
                <small id="password-help">Enter your password.</small>
            </div>

        </template>
        <template #footer>
            <Button label="Cancel" text severity="secondary" outlined @click="[(showPassword = false), (password = '')]" autofocus/>
            <Button @click="handleLogin" label="Login" outlined  autofocus/>
        </template>
    </Dialog>
    <!--    <Modal-->
    <!--        :show="showPassword"-->
    <!--        closeable-->
    <!--        @close="[(showPassword = false), (password = '')]"-->
    <!--        class="text-center"-->
    <!--    >-->
    <!--        <div class="p-2 flex flex-col">-->
    <!--            Please Enter your password for {{ currentUser.name }}-->

    <!--        </div>-->
    <!--    </Modal>-->
</template>

<script setup lang="ts">
import {reactive, ref, watch} from "vue";
import {router, useForm} from "@inertiajs/vue3";
import {debounce} from "lodash";

import AuthLayout from "@/Layouts/AuthLayout.vue";
import Card from "primevue/card";
import Button from "primevue/button";
import TextInput from "primevue/inputtext";
import Dialog from "primevue/dialog";


defineOptions({
    layout: AuthLayout
})

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

    form.post("/auth", {
        onSuccess: () => {
            router.visit("/dashboard");
        },
    });

    // router.visit("/home");
};
</script>

<style></style>
