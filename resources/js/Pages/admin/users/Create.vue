<script setup lang="ts">
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Card from "primevue/card"

defineOptions({
    layout: [DefaultLayout, AdminLayout]
})
</script>

<template>
    <div class="p-4">
        <Card>
            <template #content>
                <p>Create User</p>
            <div class="flex">
                <div class="max-w-[12rem]">
                    <h3>profile</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <div class="flex-grow"></div>
            </div>
            </template>
        </Card>
    </div>
</template>

<style scoped>

</style>
