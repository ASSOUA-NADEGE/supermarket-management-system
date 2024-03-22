<script setup lang="ts">
import GuestLayout from "@/Layouts/GuestLayout.vue";
import PrimaryProductCard from "@/Components/PrimaryProductCard.vue";
import Section from "@/Components/Section.vue";
import Paginator from 'primevue/paginator';

defineOptions({
    layout: GuestLayout
})

defineProps<{
    products: any
}>()
</script>

<template>
    <div>
        <Section>
            <div class="border h-40     "> </div>
        </Section>
        <Section>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-10">
                <PrimaryProductCard :product="product" v-for="product in products.data" :key="product.id"/>
            </div>
            <Paginator
                :template="{
                    '640px': 'PrevPageLink CurrentPageReport NextPageLink',
                    '960px': 'FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink',
                    '1300px': 'FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink',
                    default: 'FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink JumpToPageDropdown JumpToPageInput'
                }"
                :rows="10" :totalRecords="products.total" :rowsPerPageOptions="[10, 20, 30]"></Paginator>
        </Section>
    </div>
</template>

<style scoped>

</style>
