<script setup lang="ts">
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Button from "primevue/button"
import Avatar from "primevue/avatar"
import DataTable from "primevue/datatable";
import Column from "primevue/column"
import {Link, router} from "@inertiajs/vue3"
import ConfirmDialog from "primevue/confirmdialog";
import {useConfirm} from "primevue/useconfirm";


const confirm = useConfirm();

defineOptions({
    layout: [DefaultLayout, AdminLayout]
})
defineProps<{
    users: any
}>()

function confirming(id: string | number) {
    confirm.require({
        message: `Are you sure you want delete user ${id}`,
        header: "Danger Zone",
        icon: "pi pi-info-circle",
        acceptLabel: "delete",
        rejectClass: "p-button-secondary p-button-outlined",
        acceptClass: "p-button-danger",
        accept: () => {
            router.delete(route(`/admin/users/${id}`))
        },
        reject: () => {
        },
    })
}
</script>

<template>
    <div class="p-4">

        <DataTable :value="users" :paginator="true" :rows="10" striped-rows selectionMode="single">
            <template #header>
                <div class="flex flex-wrap items-center justify-between gap-2">
                    <span class="text-xl text-900 font-bold">Products</span>
                    <Link :href="route('admin.users.create')">
                        <Button icon="pi pi-user-plus" label="Create New" outlined/>
                    </Link>
                </div>
            </template>
            <Column field="Avatar" header="Avatar">
                <template #body="{data: user}">
                    <Avatar :label="user.name[0].toUpperCase()"/>
                </template>
            </Column>
            <Column field="name" sortable header="Name"></Column>
            <Column field="Email" header="Email">
                <template #body="{data: user}">
                    {{ user.email }}
                </template>
            </Column>
            <Column field="Action" header="Action">
                <template #body="{ data: user }">
                    <div class="space-x-2">
                        <Link :href="route('admin.users.edit', user)">
                            <Button outlined size="small">Edit</Button>
                        </Link>
                        <Button @click="confirming(user.id)" outlined size="small" severity="danger">Delete</Button>
                    </div>
                </template>
            </Column>
            <template #footer> In total there are {{ users ? users.length : 0 }} users.</template>
        </DataTable>
    </div>
</template>

<style scoped>

</style>
