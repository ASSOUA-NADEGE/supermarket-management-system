<script setup lang="ts">
import Loader from "@/Components/Loader.vue";
import {router, usePage} from "@inertiajs/vue3";
import {ref, onMounted, computed} from "vue";
import { debounce } from "lodash";
import { useTimeoutFn } from "@vueuse/core";
import { useToast } from 'primevue/usetoast';
import Toast from 'primevue/toast';
const toast = useToast();

const routing = ref(false);

const flash = computed(() => usePage().props.toast)
onMounted(() => {
    router.on("start", () => {
        routing.value = true;
    });
    router.on("finish", () => {
        useTimeoutFn(() => {
            routing.value = false;
        }, 2000);
    });
    console.log(flash.value)
    flash.value ? toast.add({ severity: flash.value.severity, summary: flash.value.summary, detail: flash.value.detail, life: 3000 }) : () => console.log('empty')
});

</script>
<template>
    <Toast />
    <Loader v-if="routing" />
    <div v-else>
        <slot />
    </div>
</template>

<style scoped></style>
