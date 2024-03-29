<script setup lang="ts">
import Button from "primevue/button";
import Avatar from "primevue/avatar";
import {ref} from "vue";
import Tree from "primevue/tree";
import {Link} from "@inertiajs/vue3"

const show = ref(false)
const nodes = ref([
    {
        key: '0',
        label: 'Dashboard',
    },
    {
        key: '1',
        label: 'Components In-Depth',
        children: [
            {
                key: '1-0',
                label: 'Component Registration',
                data: 'https://vuejs.org/guide/components/registration.html#component-registration',
                type: 'url'
            },
            {key: '1-1', label: 'Props', data: 'https://vuejs.org/guide/components/props.html#props', type: 'url'},
            {
                key: '1-2',
                label: 'Components Events',
                data: 'https://vuejs.org/guide/components/events.html#component-events',
                type: 'url'
            },
            {key: '1-3', label: 'Slots', data: 'https://vuejs.org/guide/components/slots.html#slots', type: 'url'}
        ]
    }
]);
</script>

<template>
    <div class="flex">
        <div class="w-1/5">
            <div class="top-0 sticky bg-neutral-800 h-screen">
                <div class="bg-primary h-14">
                </div>

                <nav class="grid gap-0.5">
                    <Link href="admin/dashboard">Dashboard</Link>
                    <Link href="admin/users">Users</Link>
                    <Link href="admin/products">Products</Link>
                    <Link href="admin/categories">Categories</Link>
                    <Link href="admin/products">Orders</Link>
                </nav>
            </div>
        </div>
        <div class="w-full " :class="{'w-4/5': show}">
            <div class="h-14 shadow w-full top-0 sticky bg-white z-10 flex justify-end items-center pr-4">
                <div class="flex items-center gap-2 ">
                    <Button icon="pi pi-search" severity="secondary"></Button>
                    <Button icon="pi pi-cog" severity="secondary"></Button>
                    <Button badge="1" badge-severity="danger" severity="secondary" icon="pi pi-bell"></Button>
                    <div class="flex items-center gap-2">
                        <p>Minister</p>
                        <Avatar label="M" shape='circle'/>
                    </div>
                </div>
            </div>
            <main class="bg-slate-200">
                <slot/>
            </main>
            <div class="h-14 shadow w-full  bg-white z-10 flex justify-between items-center px-4">
                <p class="text-xs">© 2024 right reserved</p>
            </div>
        </div>
    </div>
</template>

<style scoped>
.p-treenode-toggler-icon {
    @apply bg-transparent text-xs
}
a {
    @apply text-white p-4 bg-neutral-600/20 hover:bg-neutral-600/40 transition-colors duration-300 hover:text-primary;

}
</style>
