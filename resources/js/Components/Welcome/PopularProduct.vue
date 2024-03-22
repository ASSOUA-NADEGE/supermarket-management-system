<script setup lang="ts">
import Card from "primevue/card"
import InputNumber from "primevue/inputnumber";
import Button from "primevue/button";
import {ref} from "vue";

defineProps<{
    popular_products: any
}>()
const value = ref(0)
</script>

<template>
    <div>
        <div>
            <h1 class="text-2xl font-bold">Popular Products</h1>
        </div>

        <div class="grid grid-cols-3 gap-10">
            <Card v-for="product in popular_products" :key="product.id" class="">
                <template #header>
                    <div class="flex justify-end p-2">
                        <Button severity="secondary" class=""><i class="pi pi-heart"></i></Button>
                    </div>
                    <div class="flex justify-center">
                        <img :alt="product.name" :src="product.image" class="w-20 h-20 object-contain "/>
                    </div>
                </template>
                <template #title><p class="truncate">{{ product.name }}</p></template>
                <template #content>
                    <p class="m-0 truncate">
                        {{ product.description }}
                    </p>
                </template>
                <template #footer>
                    <div class="flex gap-3 mt-1">
                        <span class="text-sm">Price: {{ product.price }}</span>
                        <span class="text-sm">Stock: {{ product.stock }}</span>
                    </div>
                    <InputNumber class="mt-1 border-0" v-model="value" showButtons buttonLayout="horizontal"  :min="0" :max="99">
                        <template #incrementbuttonicon>
                            <span class="pi pi-plus"/>
                        </template>
                        <template #decrementbuttonicon>
                            <span class="pi pi-minus"/>
                        </template>
                    </InputNumber>

                </template>
            </Card>
        </div>
    </div>
</template>

<style scoped>

</style>
