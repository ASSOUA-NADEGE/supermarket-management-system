<script setup lang="ts">
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import Button from "primevue/button"
import Tag from "primevue/tag"
import {Link} from "@inertiajs/vue3"
defineOptions({
    layout: [DefaultLayout, AdminLayout]
})

const formatCurrency = (value:number) => {
    return value.toLocaleString('en-US', { style: 'currency', currency: 'XAF' });
};
defineProps<{
    products: any
}>()
const viewProduct = (event:any) =>{
    console.log(event.target)
}
</script>

<template>
    <div class="p-4">
        <div class="flex items-center justify-between">
            <p>Products Table</p>
            <Link :href="route('admin.products.create')">
                <Button icon="pi pi-plus" label="New Product"></Button>
            </Link>
        </div>
        <DataTable :value="products" :paginator="true" :rows="10" striped-rows @onRowSelect="viewProduct" selectionMode="single">
 <!--            <template #header>-->
<!--                <div class="flex flex-wrap items-center justify-content-between gap-2">-->
<!--                    <span class="text-xl text-900 font-bold">Products</span>-->
<!--                    <Button icon="pi pi-refresh" rounded raised/>-->
<!--                </div>-->
<!--            </template>-->
            <Column field="name" sortable  header="Name" ></Column>
            <Column header="Image">
                <template #body="slotProps">
                    <img :src="slotProps.data.image"
                         :alt="slotProps.data.image" class="size-12"/>
                </template>
            </Column>
            <Column field="price" header="Price">
                <template #body="slotProps">
                    {{ formatCurrency(slotProps.data.price) }}
                </template>
            </Column>
            <Column field="category" header="Category">
                <template  #body="slotProps">
                    {{slotProps.data.category.name}}
                </template>
            </Column>
            <Column header="Status">
                <template #body="slotProps">
                    <Tag :value="slotProps.data.status" severity="success"/>
                </template>
            </Column>
            <Column field="rating" header="Instock">
                <template #body="slotProps">
                    {{slotProps.data.stock}}
                </template>
            </Column>
            <template #footer> In total there are {{ products ? products.length : 0 }} products.</template>
        </DataTable>
    </div>
</template>

<style scoped>

</style>
