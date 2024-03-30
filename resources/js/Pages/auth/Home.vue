<template>
    <div class="">
        <h1 class="text-center">Welcome To Our Super Market</h1>

        <div class="flex items-center justify-center gap-4">
            <Link
                v-for="role in $props.roles"
                :href="'/auth/' + kebabCase(role.name)"
            >
                <AuthCard>
                    {{ role.name }}
                </AuthCard>
            </Link>
        </div>

    </div>
</template>

<script setup lang="ts">
import {ref} from "vue";
import {kebabCase} from "lodash";
import AuthLayout from "@/Layouts/AuthLayout.vue";
import AuthCard from "@/Components/AuthCard.vue"
import {Link} from "@inertiajs/vue3";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";

defineOptions({
    layout: [DefaultLayout, AuthLayout],
})

defineProps<{ roles: Record<string, any> }>();
const roles = ref(["Admin", "Sales Man"]);
</script>

<style></style>
