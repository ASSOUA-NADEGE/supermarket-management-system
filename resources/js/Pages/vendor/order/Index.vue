<template>
    <div class="space-y-10">
        <div class="card">
            <div class="justify-between items-center flex pb-2">
                <p class="px-2">Order Table</p>
                <Link href="/vendor/orders/create">
                    <Button
                        label="Create New Order"
                        icon="pi pi-plus"
                        icon-pos="right"
                    ></Button>
                </Link>
            </div>
            <DataTable :value="$props.orders" tableStyle="min-width: 50rem">
                <Column field="id" header="Code">
                    <template #body="slotProps">
                        <Link
                            :href="
                                route('vendor.orders.show', {
                                    order: slotProps.data,
                                })
                            "
                            >{{ slotProps.data.id }}</Link
                        >
                    </template>
                </Column>
                <Column field="vendor.name" header="Vendor"></Column>
                <Column field="total" header="Total (XAF)"></Column>
                <Column field="status" header="Status"></Column>
            </DataTable>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";

import DataTable from "primevue/datatable";
import Column from "primevue/column";
import VendorLayout from "@/Layouts/VendorLayout.vue";
import { Link } from "@inertiajs/vue3";
import Button from "primevue/button";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import { type Product } from "@/types";

const products = ref();
defineProps<{ orders: any }>();
defineOptions({
    layout: [DefaultLayout, VendorLayout],
});
</script>

<style scoped></style>
