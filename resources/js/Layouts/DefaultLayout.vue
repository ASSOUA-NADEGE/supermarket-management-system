<script setup lang="ts">
import Loader from "@/Components/Loader.vue";
import {router, usePage} from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import { debounce } from "lodash";
import { useTimeoutFn } from "@vueuse/core";
import { useToast } from 'primevue/usetoast';
const toast = useToast();

const routing = ref(false);

onMounted(() => {
    router.on("start", () => {
        routing.value = true;
    });
    router.on("finish", () => {
        useTimeoutFn(() => {
            routing.value = false;
        }, 2000);
    });
    usePage().props.auth.message ? toast.add({ severity: 'info', summary: 'Info', detail: usePage().props.auth.message, life: 3000 }): '`';
});
</script>

<template>
    <Loader v-if="routing" />
    <div v-else>
        <slot />
    </div>
</template>

<style scoped></style>
