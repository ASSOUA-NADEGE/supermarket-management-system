<script setup lang="ts">
import Button from "primevue/button";
import Divider from "primevue/divider";
defineProps<{
    title: string,
    description: string
}>()
</script>

<template>
    <div class="bg-white">
            <div class="flex items-center justify-between px-4 ">
                <div>
                    <h4>{{title}}</h4>
                    <p class="text-xs">{{ description }}</p>
                </div>
                <Button icon="pi pi-bars" severity="secondary"></Button>
            </div>
        <Divider />
        <div class="p-4">
            <slot />
        </div>
    </div>
</template>

<style scoped>

</style>
