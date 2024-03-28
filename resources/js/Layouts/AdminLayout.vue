<script setup lang="ts">
import Button from "primevue/button";
import Avatar from "primevue/avatar";
import {ref} from "vue";

const show = ref(false)
</script>

<template>
    <div class="flex">
        <div class="w-1/5">
            <div class="top-0 sticky bg-neutral-800 h-screen">
                <div class="bg-neutral-700 h-14">
                </div>
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

</style>
