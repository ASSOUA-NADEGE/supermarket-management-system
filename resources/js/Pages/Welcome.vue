<script setup lang="ts">
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Hero from "@/Components/Welcome/Hero.vue";
import Section from "@/Components/Section.vue";
import Category from "@/Components/Welcome/Category.vue";
import PopularProduct from "@/Components/Welcome/PopularProduct.vue";
defineOptions({
    layout: GuestLayout
});

defineProps<{
    categories: any,
    popular_product: any
}>()
</script>

<template>
<div>
    <Hero />
    <Section class="py-10">
        <Category :categories="categories" />
    </Section>
    <Section>
        <PopularProduct :popular-product="popular_product" />
    </Section>

</div>
</template>

<style scoped>

</style>
