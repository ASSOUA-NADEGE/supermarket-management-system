<script setup lang="ts">
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Section from "@/Components/Section.vue";
import {Link} from "@inertiajs/vue3";
import Button from "primevue/button";
import Rating from "primevue/rating"
import {ref} from "vue";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";

const value = ref(0)
const rating = ref(4)
defineOptions({
    layout: [DefaultLayout,GuestLayout]
})
defineProps<{
    product: any
}>()
</script>

<template>
    <Section class="py-10">
        <div>
            <Link :href="route('products.index')">
                <Button icon="pi pi-angle-left" severity="secondary"></Button>
            </Link>
        </div>
        <div class="grid  lg:grid-cols-3 gap-10">
            <div class=" ">
                <div class="size-96 flex items-center justify-center py-4">
                    <img :src="product.image" :alt="product.name" class="object-contain w-full h-full object-center">
                </div>
            </div>
            <div class="lg:col-span-2" >
                <div class="flex justify-between flex-wrap gap-2">
                    <div class="flex items-center">
                        <Button @click="value--" severity="secondary" icon="pi pi-minus"></Button>
                        <div class="w-10 h-full flex items-center justify-center bg-neutral-100">{{ value }}</div>
                        <Button @click="value++" severity="secondary" icon="pi pi-plus"></Button>
                    </div>
                    <div class="flex items-center gap-4">
                        <span>Add to Cart</span>
                        <Button icon="pi pi-fw pi-shopping-cart"></Button>
                    </div>
                </div>
                <h1 class="text-2xl font-bold">{{ product.name }}</h1>
                <p>{{ product.description }}</p>
                <div>
                    <p class="text-sm">{{ product.category.name }}</p>
                    <Rating v-model="rating" readonly :cancel="false"/>
                </div>
                <div class="flex gap-10">
                    <p><span class="text-primary font-bold">Price:</span> ${{ product.price }}</p>
                    <p><span class="text-primary font-bold">In Stock:</span> {{ product.stock }}</p>
                </div>
            </div>
        </div>
    </Section>
</template>

<style scoped>

</style>
