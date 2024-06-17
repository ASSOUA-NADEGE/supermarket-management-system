<script setup lang="ts">
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
defineOptions({
    layout: [DefaultLayout,AdminLayout]
})
defineProps<{
    orders: any
}>()
</script>

<template>
<DataTable :value="$props.orders" tableStyle="min-width: 50rem">
                <Column field="id" header="id">
                    <template #body="{ data: order }">
                        {{order.id}}
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
</template>

<style scoped>

</style>
