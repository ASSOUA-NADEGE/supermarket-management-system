<script setup>
import Card from "primevue/card"
</script>
<template>
    <Card class="hover:bg-primary hover:text-white transition-all duration-200 cursor-pointer">
        <template #content>
            <slot />
        </template>
    </Card>
</template>

