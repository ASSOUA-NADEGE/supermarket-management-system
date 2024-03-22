<script setup>
import {ref} from "vue";
import Sidebar from "primevue/sidebar";
import Button from "primevue/button";
import Avatar from "primevue/avatar";
import Panel from "primevue/panel";
import MenuItem from "primevue/menuitem";

const visible = ref(false);
const links = [
    {
        label: 'Dashboard',
        icon: 'pi pi-fw pi-home',
        to: '/'
    }, {
        label: 'Profile',
        icon: 'pi pi-fw pi-user',
        to: '/profile'
    },
    {
        label: 'Orders',
        icon: 'pi pi-fw pi-shopping-cart',
        to: '/orders'
    },
    {
        label: 'Products',
        icon: 'pi pi-fw pi-shopping-cart',
        to: '/products'
    },
    {
        label: 'Settings',
        icon: 'pi pi-fw pi-cog',
        to: '/settings'
    },
    {
        label: 'Logout',
        icon: 'pi pi-fw pi-power-off',
        to: '/logout'
    },
]
</script>

<template>
    <div class="flex">
        <div class="w-1/4">
            <Sidebar :visible="true" :modal="false" :show-close-icon="false">
                <template #header>
                    <div class="w-full">
                        <div class="flex items-center justify-between">
                            <p>logo</p>
                            <Button icon="pi pi-bell" severity="secondary"/>
                        </div>
                    </div>
                </template>
                <ul class="list-none p-0 m-0 overflow-hidden space-y-4">
                    <li v-for="link in links" class="bg-neutral-50 hover:bg-neutral-100">
                        <a v-ripple
                           class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple">
                            <i :class="link.icon" class="mr-3"></i>
                            <span class="font-medium">{{ link.label }}</span>
                        </a>
                    </li>
                </ul>
            </Sidebar>
        </div>
        <div class="w-3/4 h-[1024px]">
            <MenuItem :items="links"></MenuItem>
        </div>
    </div>
</template>


