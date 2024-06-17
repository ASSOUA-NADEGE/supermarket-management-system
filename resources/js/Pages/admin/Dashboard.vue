<script setup lang="ts">
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import CardInfo from "@/Components/CardInfo.vue";
import SalesChart from "@/Components/SalesChart.vue";
import ActivitiesCard from "@/Components/ActivitiesCard.vue";

defineOptions({
    layout: [DefaultLayout,AdminLayout]
})
</script>

<template>
    <div class="p-10">
        <div class="grid grid-cols-3 gap-8">
            <CardInfo v-for="i in 3" class="rounded-none col-span-3 md:col-span-1"></CardInfo>
            <SalesChart class="rounded-none col-span-3" />
            <ActivitiesCard v-for="(i,index) in 5" class="col-span-3 md:col-span-1" :class="{'md:col-span-2 md:row-span-2 col-span-3':index === 0,'md:col-span-2 col-span-3':index===4}" />
        </div>
    </div>
</template>

<style scoped>

</style>
