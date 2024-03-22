<script setup lang="ts">
import {Variants} from "@/types/variants";
import {computed} from "vue";

const {variant} = defineProps<Variants>()

const classes = computed(() => ({
    'primary': variant === 'primary',
}))
</script>

<template>
    <div :class="[classes]">
        <div class="container mx-auto px-4 lg:px-0">
            <slot/>
        </div>
    </div>
</template>

<style scoped>
.primary {
    background-color: var(--highlight-bg);
}
</style>
