<script setup lang="ts">
import {ref, onMounted} from 'vue';

import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import VendorLayout from "@/Layouts/VendorLayout.vue";
import {Link} from "@inertiajs/vue3"
import Button from "primevue/button"

const products = ref();
defineOptions({
    layout: VendorLayout
})
</script>

<template>
    <div class="space-y-10">

        <div class="card">
            <div class="justify-between items-center flex pb-2">
                <p class="px-2">Order Table</p>
                <Link href="/vendor/orders/create">
                    <Button label="Create New Order" icon="pi pi-plus" icon-pos="right"></Button>
                </Link>
            </div>
            <DataTable :value="products" tableStyle="min-width: 50rem">
                <Column field="code" header="Code"></Column>
                <Column field="name" header="Total Amount"></Column>
                <Column field="category" header="Status"></Column>
                <Column field="quantity" header="Quantity"></Column>
            </DataTable>
        </div>
    </div>


</template>

<style scoped>

</style>
