<script setup lang="ts">
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import CardInfo from "@/Components/CardInfo.vue";
import SalesChart from "@/Components/SalesChart.vue";
import ActivitiesCard from "@/Components/ActivitiesCard.vue";
import Card from 'primevue/card'
import { reactive } from "vue";
import { differenceInHours } from "date-fns/differenceInHours";
import { differenceInDays } from "date-fns/differenceInDays";
import { differenceInWeeks } from "date-fns/differenceInWeeks";
import { differenceInMonths } from "date-fns/differenceInMonths";

defineOptions({
    layout: [DefaultLayout,AdminLayout]
})

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
    <div class="p-10">
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
                                :icon="`pi ${card.percentage >= 0 ? 'pi-arrow-up' : 'pi-arrow-down'}`"
                                :severity="card.percentage < 0 ? 'danger' : ''"
                            ></Button>
                        </div>
                    </div>
                </template>
            </Card>
            <CardInfo v-for="i in 3" class="rounded-none col-span-3 md:col-span-1"></CardInfo>
            <SalesChart class="rounded-none col-span-3" />
            <ActivitiesCard v-for="(i,index) in 5" class="col-span-3 md:col-span-1" :class="{'md:col-span-2 md:row-span-2 col-span-3':index === 0,'md:col-span-2 col-span-3':index===4}" />
        </div>
    </div>
</template>

<style scoped>

</style>
