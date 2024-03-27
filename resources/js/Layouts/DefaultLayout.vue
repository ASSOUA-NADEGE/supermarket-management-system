<script setup lang="ts">
import Loader from "@/Components/Loader.vue"
import {router} from '@inertiajs/vue3'
import {ref, onMounted} from "vue";

const routing = ref(false)

onMounted(() => {
    router.on('start', () => {
        routing.value = true
    })
    router.on('finish', () => {
        routing.value = false
    })
})
</script>

<template>
    <Loader v-if="routing"/>
    <div v-else>
        <slot/>
    </div>
</template>

<style scoped>

</style>
