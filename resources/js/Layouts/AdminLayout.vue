<script setup lang="ts">
import Button from "primevue/button";
import {Link} from "@inertiajs/vue3"
import UserBadge from "@/Components/UserBadge.vue";
import Search from "@/Components/Search.vue";
import {ref} from "vue";





const links = [
    {
        name: 'Dashboard',
        icon: 'pi-box',
        component: 'admin/Dashboard',
        href: route('admin.dashboard')
    }, {
        name: 'Users',
        icon: 'pi-users',
        component: 'admin/users/Index',
        href: route('admin.users')
    },
    {
        name: 'Products',
        icon: 'pi-shopping-cart',
        component: 'admin/products/Index',
        href: route('admin.products')
    },
    {
        name: 'Orders',
        icon: 'pi-list',
        component: 'admin/orders/Index',
        href: route('admin.orders')
    },
    {
        name: 'Categories',
        icon: 'pi-bookmark',
        component: 'admin/categories/Index',
        href: route('admin.categories')
    }

]

const nav = ref<boolean>(false)
function navFunction(){
    nav.value = !nav.value
}
</script>

<template>
    <div class="flex">
        <div class="w-1/5" :class="[nav ? 'hidden': '']">
            <div class="top-0 sticky bg-neutral-800 h-screen">
                <div class="bg-primary h-14">
                </div>

                <nav class="grid gap-0.5">
                    <Link v-for="link in links" :href="link.href" class="flex link items-center gap-3">
                        <i :class="[`pi ${link.icon}`,$page.component === link.component ? 'text-primary': ''   ]"></i>
                        <span :class="[$page.component === link.component ? 'text-primary': '']">{{ link.name }}</span>
                    </Link>
                </nav>
            </div>
        </div>
        <div class="w-full ">
            <div class="h-14 shadow w-full top-0 sticky bg-white z-10 flex justify-between items-center p-4">
                <Button @click="navFunction()" :icon="`pi ${nav ? 'pi-bars': 'pi-times'}`" :severity="nav ? 'secondary':''" ></Button>
                <div class="flex items-center gap-2 ">
                    <Search />
<!--                    <Button icon="pi pi-cog" severity="secondary"></Button>-->
                    <Button badge="" badge-severity="danger" severity="secondary"  icon="pi pi-bell"></Button>
                    <UserBadge />
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
.link {
    @apply text-white p-4 bg-neutral-600/20 hover:bg-neutral-600/40 transition-colors duration-300 hover:text-primary;
}
</style>
