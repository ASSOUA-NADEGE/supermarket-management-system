<script setup lang="ts">
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import DataTable from "primevue/datatable";
import Button from "primevue/button"
import Column from "primevue/column"
import {Link, router} from "@inertiajs/vue3"
import ConfirmDialog from "primevue/confirmdialog";
import {useConfirm} from "primevue/useconfirm";
const confirm = useConfirm();

function confirming(id: string|number){
    confirm.require({
        message: "Are you sure you want delete",
        header: "Danger Zone",
        icon: "pi pi-info-circle",
        acceptLabel: "delete",
        rejectClass: "p-button-secondary p-button-outlined",
        acceptClass: "p-button-danger",
        accept: () => {
            router.delete(route(`/admin/categories/${id}`))
        },
        reject: () => {},
    })
}


defineOptions({
    layout: [DefaultLayout, AdminLayout]
})
defineProps<{
    categories: any
}>()
</script>

<template>
    <div class="p-4">
        <div class="flex items-center justify-between">
            <p>Category Table</p>
            <Link :href="route('admin.categories.create')">
                <Button icon="pi pi-plus" label="New Category"></Button>
            </Link>
        </div>
        <DataTable :value="categories" :paginator="true" :rows="10" striped-rows @onRowSelect="viewProduct"
                   selectionMode="single">

            <Column field="id" sortable header="ID"></Column>
            <Column field="name" header="Name">
                <template #body="{data: category}">
                    {{ category.name }}
                </template>
            </Column>
            <Column header="Description">
                <template #body="{data: category}">
                    <div v-html="category.description"></div>
                </template>
            </Column>
            <Column header="Action">
                <template #body="{data: category}">
                    <div class="space-x-2">
                        <Button @click="confirming(category.id)" outlined severity="danger">Delete</Button>
                    </div>
                </template>
            </Column>
            <template #footer> In total there are {{ categories ? categories.length : 0 }} categories.</template>
        </DataTable>
    </div>
</template>

<style scoped>

</style>
