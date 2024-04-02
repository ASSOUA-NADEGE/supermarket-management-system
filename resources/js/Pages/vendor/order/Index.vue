<script setup lang="ts">
import { ref, onMounted } from "vue";

import DataTable from "primevue/datatable";
import Column from "primevue/column";
import VendorLayout from "@/Layouts/VendorLayout.vue";
import { Link } from "@inertiajs/vue3";
import Button from "primevue/button";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";

const products = ref();
defineProps<{ orders: Record<string, any> }>();
defineOptions({
    layout: [DefaultLayout, VendorLayout],
});
</script>

<template>
    <div class="space-y-10 px-4 py-2">
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
                <Column field="id" header="id">
                    <template #body="{ data: order }">
                        <Link :href="route('vendor.orders.show', order)">
                            {{ order.id }}
                        </Link>
                    </template>
                </Column>
                <Column field="status" header="Status">
                    <template #body="{ data: order }">
                        <span
                            :class="[
                                'px-1 py-px text-xs rounded-full inline-flex items-center justify-center',
                                {
                                    'bg-green-500 text-green-950':
                                        order.status == 'completed',
                                },
                                {
                                    'bg-amber-600 text-white':
                                        order.status == 'pending',
                                },
                                {
                                    'bg-sky-500 text-blue-800':
                                        order.status == 'processing',
                                },
                                {
                                    'bg-red-500 text-white':
                                        order.status == 'refunded',
                                },
                            ]"
                        >
                            {{ order.status }}
                        </span>
                    </template>
                </Column>
                <Column field="total" header="Amount (XAF)">
                    <template #body="{ data: order }">
                        FCFA {{ order.total }}
                    </template>
                </Column>
            </DataTable>
        </div>
    </div>
</template>

<style scoped></style>
