<script setup lang="ts">
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Hero from "@/Components/Welcome/Hero.vue";
import Section from "@/Components/Section.vue";
import Category from "@/Components/Welcome/Category.vue";
import PopularProduct from "@/Components/Welcome/PopularProduct.vue";
import Card from "primevue/card"
import InputNumber from "primevue/inputnumber"
import Button from "primevue/button"
import {ref} from "vue";
import ProductCard from "@/Components/ProductCard.vue";
import PrimaryProductCard from "@/Components/PrimaryProductCard.vue";

const value = ref(0)

defineOptions({
    layout: GuestLayout
});

defineProps<{
    categories: any,
    popular_products: any,
    deals: any
}>()

const testimonial = [{
    name: "John",
    image: "https://i.pravatar.cc/300",
    content: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque illo incidunt iure modi neque obcaecati officiis quam quod vero vitae?"
}, {
    name: "Paul",
    image: "https://i.pravatar.cc/301",
    content: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque illo incidunt iure modi neque obcaecati officiis quam quod vero vitae?"
}, {
    name: "Mark",
    image: "https://i.pravatar.cc/302",
    content: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque illo incidunt iure modi neque obcaecati officiis quam quod vero vitae?"
}]
</script>

<template>
    <div>
        <Hero/>
        <Section class="py-10">
            <Category :categories="categories"/>
        </Section>
        <Section class="py-10">
            <PopularProduct :popular_products="popular_products"/>
        </Section>
        <Section  class="py-10">
            <h1 class="text-2xl font-bold">Best selling products</h1>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
                <PrimaryProductCard class="bg-white" :product="product" v-for="product in deals" :key="product.id" />
            </div>
        </Section>
        <Section variant="primary" class="py-10">
            <h1 class="text-2xl font-bold">Don't miss our products</h1>
            <div class="grid md:grid-cols-3  gap-10">
                <PrimaryProductCard class="bg-white" :product="product" v-for="product in deals" :key="product.id" />
            </div>
        </Section>
        <Section class="py-10">
            <h1 class="text-2xl font-bold">What our customers say</h1>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-10">
                <Card  v-for="test in testimonial" :key="test.name" class="p-5 shadow-none border">
                    <template #title>
                        <div class="flex items-center gap-4 ">
                            <div class="size-14 flex item-center justify-center rounded-full overflow-hidden">
                                <img :src="test.image" :alt="test.name">
                            </div>
                            <p>{{ test.name }}</p>
                        </div>
                    </template>
                    <template #content>{{ test.content }}</template>
                </Card>
            </div>
        </Section>
    </div>
</template>

<style scoped>

</style>
