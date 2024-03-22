<script setup lang="ts">
import Button from "primevue/button"
import Panel from "primevue/panel"
import {ref, watch} from "vue";
import {Link} from "@inertiajs/vue3";

defineProps<{ product: any }>()
const value = ref(0)
watch(value, function () {
    if (value.value < 0) {
        value.value = 0
    }
})
</script>

<template>
    <Panel>
        <template #header>
            <Button severity="secondary" icon="pi pi-heart"></Button>
        </template>
        <template #default>
            <div class="flex justify-center mb-2">
                <img :alt="product.name" :src="product.image" class="w-20 h-20 object-contain "/>
            </div>

            <Link :href="route('products.show',product.id)" class="font-bold text-neutral-900">{{ product.name }}</Link>
            <p class="lg:truncate">{{ product.description }}</p>
            <p>${{ product.price }}</p>
        </template>
        <template #footer>
            <div class="flex justify-between flex-wrap gap-2">
            <div class="flex items-center">
                <Button @click="value--" severity="secondary" icon="pi pi-minus"></Button>
                <div class="w-10 h-full flex items-center justify-center bg-neutral-100">{{ value }}</div>
                <Button @click="value++" severity="secondary" icon="pi pi-plus"></Button>
            </div>
            <Button icon="pi pi-fw pi-shopping-cart"></Button>
            </div>
        </template>
    </Panel>
</template>

<style scoped>

</style>
