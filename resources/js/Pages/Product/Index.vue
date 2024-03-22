<script setup lang="ts">
import GuestLayout from "@/Layouts/GuestLayout.vue";
import PrimaryProductCard from "@/Components/PrimaryProductCard.vue";
import Section from "@/Components/Section.vue";
import IconField from "primevue/iconfield";
import InputIcon from "primevue/inputicon";
import InputText from "primevue/inputtext";
import Paginator from 'primevue/paginator';
import PanelMenu from "primevue/panelmenu";
import {Link} from "@inertiajs/vue3";

defineOptions({
    layout: GuestLayout
})

defineProps<{
    products: any,
    categories: any
}>()
</script>

<template>
    <div class="lg:flex gap-10 py-10">
        <div class="lg:w-1/4">
            <div class="sticky top-0">
                <div class="p-4">
                    <IconField iconPosition="left">
                        <InputIcon class="pi pi-search"></InputIcon>
                        <InputText placeholder="Search"/>
                    </IconField>
                    <div>
                        <h1>Categories</h1>
                        <PanelMenu :model="categories">
                            <template #item="{ item,props }">
                                <Link class="flex align-items-center cursor-pointer text-color px-3 py-2 no-underline text-neutral-900" v-bind="props.action">
                                    <span :class="item.icon"/>
                                    <span class="ml-2">{{ item.name }}</span>
                                    <span v-if="item.items" class="pi pi-angle-down text-primary ml-auto"/>
                                </Link>
                            </template>
                        </PanelMenu>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:w-3/4 pr-4">
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
        </div>

    </div>
</template>

<style scoped>

</style>
