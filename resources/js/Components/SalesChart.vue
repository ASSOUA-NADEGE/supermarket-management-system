<template>
    <Card class="rounded-none">
        <template #header>
            <h2 class="px-4">Yearly Sales</h2>
        </template>
        <template #content>
            <Chart type="bar" :data="chartData" :options="chartOptions" class="h-72"/>
        </template>
    </Card>
</template>

<script setup>
import Card from "primevue/card"
import {ref, onMounted} from "vue";

import Chart from 'primevue/chart';
import { usePage } from "@inertiajs/vue3";

const pageProps = usePage().props

const chartData = {
    labels: Object.keys(pageProps.chart),
    datasets: [{
        label: 'Total Prices',
        data: Object.values(pageProps.chart)
    }]
}

onMounted(() => {
    // chartData.value = setChartData();
    chartOptions.value = setChartOptions();
});

// const chartData = ref();
const chartOptions = ref();

const setChartData = () => {
    const documentStyle = getComputedStyle(document.documentElement);

    return {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [
            {
                label: 'My First dataset',
                backgroundColor: documentStyle.getPropertyValue('--cyan-500'),
                borderColor: documentStyle.getPropertyValue('--cyan-500'),
                data: [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label: 'My Second dataset',
                backgroundColor: documentStyle.getPropertyValue('--gray-500'),
                borderColor: documentStyle.getPropertyValue('--gray-500'),
                data: [28, 48, 40, 19, 86, 27, 90]
            }
        ]
    };
};
const setChartOptions = () => {
    const documentStyle = getComputedStyle(document.documentElement);
    const textColor = documentStyle.getPropertyValue('--text-color');
    const textColorSecondary = documentStyle.getPropertyValue('--text-color-secondary');
    const surfaceBorder = documentStyle.getPropertyValue('--surface-border');

    return {
        maintainAspectRatio: false,
        aspectRatio: 0.8,
        plugins: {
            legend: {
                labels: {
                    color: textColor
                }
            }
        },
        scales: {
            x: {
                ticks: {
                    color: textColorSecondary,
                    font: {
                        weight: 500
                    }
                },
                grid: {
                    display: false,
                    drawBorder: false
                }
            },
            y: {
                ticks: {
                    color: textColorSecondary
                },
                grid: {
                    color: surfaceBorder,
                    drawBorder: false
                }
            }
        }
    };
}
</script>
