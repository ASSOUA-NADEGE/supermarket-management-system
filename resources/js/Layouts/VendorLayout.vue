<script setup>
import {ref} from "vue";
import Sidebar from "primevue/sidebar";
import Button from "primevue/button";
import Avatar from "primevue/avatar";
import Panel from "primevue/panel";
import MenuBar from "primevue/menubar";
import {Link} from "@inertiajs/vue3"
import Dialog from "primevue/dialog"

const visible = ref(false);
const logoutDialog = ref(false)
const links = [
    {
        label: 'Dashboard',
        icon: 'pi pi-fw pi-home',
        to: '/vendor/dashboard',
        component: 'vendor/Dashboard'
    },
    {
        label: 'Orders',
        icon: 'pi pi-fw pi-shopping-cart',
        to: '/vendor/orders',
        component: 'vendor/order/Index'
    },

]
</script>

<template>
    <div class="">
        <Sidebar class='' v-model:visible="visible"
                 :modal="false"
                 :show-close-icon="true" position="left">
            <menu class="list-none p-0 m-0 overflow-hidden space-y-4">
                <Link
                    class="flex text-neutral-700  align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple"
                    :class="{'bg-neutral-800/20 text-neutral-200': $page.component === link.component}"
                    v-for="link in links" :href="link.to">
                    <i :class="link.icon" class="mr-3"></i>
                    <span class="font-medium">{{ link.label }}</span>
                </Link>
            </menu>
            <Button @click="logoutDialog=true" class="absolute bottom-2" severity="secondary" icon="pi pi-power-off"
                    icon-pos="right" label="logout"></Button>
            <Dialog class="p-2" v-model:visible="logoutDialog" modal draggable :base-z-index="100" closable>
                <p>Do you really want to logout ??</p>
                <div class="space-x-4">
                    <Button severity="secondary" @click="logoutDialog=false">cancel</Button>
                    <Button severity="danger">confirm</Button>
                </div>
            </Dialog>
        </Sidebar>
        <div class="w-full">
            <MenuBar :items="links" class="sticky top-0 z-20">
                <template #start>
                    <Button @click="visible=true" icon="pi pi-bars"></Button>
                </template>
                <template #end>
                    <div class="flex items-center gap-4 px-2">
                        <Button badge="1" badge-severity="danger" severity="secondary" icon="pi pi-bell"></Button>
                        <div class="flex items-center gap-2">
                            <p>Minister</p>
                            <Avatar label="M" shape='circle'/>
                        </div>
                    </div>
                </template>
            </MenuBar>
            <main class="bg-neutral-100 ">
                <slot/>
            </main>
        </div>
    </div>
</template>

<style>
.bg-primary {
    background-color: var(--primary-color)
}
</style>


