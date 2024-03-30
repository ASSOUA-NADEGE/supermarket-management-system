<script setup lang="ts">
import Section from "@/Components/Section.vue";
import Button from "primevue/button";
import {Link} from "@inertiajs/vue3"

</script>

<template>
    <div class="relative h-screen w-full overflow-hidden">
        <div class="absolute inset-0  h-full w-full" style="background-color: var(--highlight-bg);">


            <div class="flex items-center justify-center relative">
                <div
                    class="size-96 bg-blue-400 rounded-full absolute top-20 mix-blend-multiply animate-blob filter blur-2xl opacity-30"></div>
                <div
                    class="size-96 bg-yellow-400 rounded-full absolute top-72 left-80 mix-blend-multiply filter blur-2xl opacity-30 animate-blob animation-delay-200"></div>
                <div
                    class="size-96 bg-red-400 rounded-full absolute right-80 top-72 mix-blend-multiply filter blur-2xl opacity-30 animate-blob animation-delay-400"></div>
            </div>
        </div>
        <Section class="relative grid place-items-center h-screen">
            <Link href="/">
                <Button severity="secondary" icon="pi pi-angle-double-left" class="absolute top-5 left-10"></Button>
            </Link>
            <slot/>
        </Section>
    </div>
</template>


