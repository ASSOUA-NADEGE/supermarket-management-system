<script setup lang="ts">
import {Link} from '@inertiajs/vue3';
defineProps<{
    categories: any, // TODO: change to Category interface
}>()
</script>

<template>
    <div>
        <div>
            <h1 class="text-2xl font-bold">Category</h1>
        </div>
        <div>
            <ul class="flex gap-8">
                <Link  :href="route('landing')" v-for="category in categories" :key="category.id" class="size-20  rounded bg-neutral-50 hover:bg-neutral-100 text-neutral-900 items-center justify-center flex p-4 no-underline">
                    <p class="text-xs">{{category.name}}</p>
                </Link>
            </ul>
        </div>
    </div>
</template>

<style scoped>

</style>
