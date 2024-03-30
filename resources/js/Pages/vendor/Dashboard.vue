<script setup lang="ts">
import VendorLayout from "@/Layouts/VendorLayout.vue";
import Card from "primevue/card"
import Button from "primevue/button"
import SalesChart from "@/Components/SalesChart.vue";
import {Link} from "@inertiajs/vue3"
import ProductSalesChart from "@/Components/ProductSalesChart.vue";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";

defineOptions({
    layout: [DefaultLayout,VendorLayout]
})
</script>

<template>
    <div class="space-y-4 px-4 py-2">
        <Link href="/vendor/orders/create">
            <Button label="New Order" icon="pi pi-plus" icon-pos="right"></Button>
        </Link>
        <div class="grid grid-cols-3 gap-8">
            <Card v-for="i in 3" class="rounded-none">
                <template #content>
                    <div class="space-y-0">
                        <h5>Today's Order</h5>
                        <h1>2500</h1>
                        <div class="flex items-center justify-between">
                            <p class="text-sm"><span>+31%</span>than last week</p>
                            <Button outlined aria-readonly="true" icon="pi pi-arrow-up"></Button>
                        </div>
                    </div>
                </template>
            </Card>
            <SalesChart class="col-span-2"/>
            <ProductSalesChart/>
        </div>
        <Card class="rounded-none">
            <template #content>
                <DataTable :value="products" tableStyle="min-width: 50rem">
                    <Column field="code" header="Code"></Column>
                    <Column field="name" header="Total Amount"></Column>
                    <Column field="category" header="Status"></Column>
                    <Column field="quantity" header="Quantity"></Column>
                </DataTable>
            </template>
        </Card>
    </div>
</template>

<style scoped>

</style>
