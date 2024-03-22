<script setup lang="ts">
import Card from "primevue/card"
import InputNumber from "primevue/inputnumber";
import Button from "primevue/button";
import {ref} from "vue";
import ProductCard from "@/Components/ProductCard.vue";
import PrimaryProductCard from "@/Components/PrimaryProductCard.vue";

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

        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
            <PrimaryProductCard :product="product" v-for="product in popular_products" :key="product.id"/>
        </div>
    </div>
</template>

<style scoped>

</style>
