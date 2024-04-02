<script setup lang="ts">
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Button from "primevue/button"
import Avatar from "primevue/avatar"
import DataTable from "primevue/datatable";
import Column from "primevue/column"
import {Link} from "@inertiajs/vue3"

defineOptions({
    layout: [DefaultLayout, AdminLayout]
})
defineProps<{
    users: any
}>()
</script>

<template>
    <div class="p-4">

        <DataTable :value="users" :paginator="true" :rows="10" striped-rows selectionMode="single">
            <template #header>
                <div class="flex flex-wrap items-center justify-between gap-2">
                    <span class="text-xl text-900 font-bold">Products</span>
                    <Link :href="route('admin.users.create')"><Button icon="pi pi-user-plus" label="Create New" outlined/></Link>
                </div>
            </template>
            <Column field="Avatar" header="Avatar">
                <template #body="slotProps">
                    <Avatar :label="slotProps.data.name[0].toUpperCase()"/>
                </template>
            </Column>
            <Column field="name" sortable header="Name"></Column>
            <Column field="Email" header="Email">
                <template #body="slotProps">
                    {{ slotProps.data.email }}
                </template>
            </Column>
            <template #footer> In total there are {{ users ? users.length : 0 }} users.</template>
        </DataTable>
    </div>
</template>

<style scoped>

</style>
