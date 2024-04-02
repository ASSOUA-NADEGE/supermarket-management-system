<script setup lang="ts">
import { reactive } from "vue";
import {
    differenceInHours,
    differenceInDays,
    differenceInWeeks,
    differenceInMonths,
} from "date-fns";
import { take } from "lodash";
import VendorLayout from "@/Layouts/VendorLayout.vue";
import Card from "primevue/card";
import Button from "primevue/button";
import SalesChart from "@/Components/SalesChart.vue";
import { Link } from "@inertiajs/vue3";
import ProductSalesChart from "@/Components/ProductSalesChart.vue";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";

defineOptions({
    layout: [DefaultLayout, VendorLayout],
});
const props = defineProps<{ orders: Array<Record<string, any>> }>();

const cards = reactive([
    {
        title: "Today's Orders",
        quantity: props.orders.filter(
            (order) => differenceInHours(new Date(), order.created_at) <= 24,
        ).length,
        percentage: props.orders.reduce(
            (acc, order, index, orders) => {
                acc.today +=
                    differenceInHours(new Date(), order.created_at) <= 24
                        ? 1
                        : 0;

                acc.yesterday +=
                    differenceInHours(new Date(), order.created_at) > 24 &&
                    differenceInHours(new Date(), order.created_at) <= 48
                        ? 1
                        : 0;

                acc.value = (
                    (acc.today / (acc.yesterday + acc.today)) *
                    100
                ).toFixed(1);

                return acc;
            },
            { today: 0, yesterday: 0, value: 0 },
        ).value,
    },
    {
        title: "This week's Orders",
        quantity: props.orders.filter(
            (order) => differenceInWeeks(new Date(), order.created_at) <= 1,
        ).length,
        percentage: props.orders.reduce(
            (acc, order, index, orders) => {
                acc.today +=
                    differenceInDays(new Date(), order.created_at) <= 7 ? 1 : 0;

                acc.yesterday +=
                    differenceInDays(new Date(), order.created_at) > 7 &&
                    differenceInDays(new Date(), order.created_at) <= 14
                        ? 1
                        : 0;

                acc.value = (
                    (acc.today / (acc.yesterday + acc.today)) *
                    100
                ).toFixed(1);

                return acc;
            },
            { today: 0, yesterday: 0, value: 0 },
        ).value,
    },
    {
        title: "This month's Orders",
        quantity: props.orders.filter(
            (order) => differenceInMonths(new Date(), order.created_at) <= 1,
        ).length,
        percentage: props.orders.reduce(
            (acc, order, index, orders) => {
                acc.today +=
                    differenceInMonths(new Date(), order.created_at) <= 1
                        ? 1
                        : 0;

                acc.yesterday +=
                    differenceInMonths(new Date(), order.created_at) > 1 &&
                    differenceInMonths(new Date(), order.created_at) <= 2
                        ? 1
                        : 0;

                acc.value = Number(
                    (acc.today / (acc.yesterday + acc.today)) * 100,
                ).toFixed(0);

                return acc;
            },
            { today: 0, yesterday: 0, value: 0 },
        ).value,
    },
]);
</script>

<template>
    <div class="space-y-4 px-4 py-2">
        <Link href="/vendor/orders/create">
            <Button
                label="New Order"
                icon="pi pi-plus"
                icon-pos="right"
            ></Button>
        </Link>
        <div class="grid grid-cols-3 gap-8">
            <Card v-for="card in cards" class="rounded-none">
                <template #content>
                    <div class="space-y-0">
                        <h5>{{ card.title }}</h5>
                        <h1>{{ card.quantity }}</h1>
                        <div class="flex items-center justify-between">
                            <p class="text-sm">
                                <span>
                                    {{
                                        `${card.percentage > 0 ? "+" : "-"} ${card.percentage}%`
                                    }}
                                </span>
                            </p>
                            <Button
                                outlined
                                aria-readonly="true"
                                :icon="[
                                    'pi',
                                    {
                                        'pi-arrow-up': card.percentage >= 0,
                                        'pi-arrow-down': card.percentage < 0,
                                    },
                                ]"
                                :severity="card.percentage < 0 ? 'danger' : ''"
                            ></Button>
                        </div>
                    </div>
                </template>
            </Card>
            <SalesChart class="col-span-2" />
            <ProductSalesChart />
        </div>
        <Card class="rounded-none">
            <template #content>
                <DataTable
                    :value="take($props.orders.reverse(), 5)"
                    tableStyle="min-width: 50rem"
                >
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
            </template>
        </Card>
    </div>
</template>

<style scoped></style>
