<template>
    <div class="flex flex-col h-screen w-screen">
        <h3>Welcome to the Supermarket</h3>
        <div class="grow grid place-content-center">
            <div class="grid grid-cols-3 gap-4">
                <a
                    class="rounded border border-black flex items-center justify-center size-40"
                    :href="'/auth/' + kebabCase(role.name)"
                    v-for="role in $props.roles"
                    v-text="role.name"
                ></a>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { kebabCase } from "lodash";

defineProps<{ roles: Record<string, any> }>();
const roles = ref(["Admin", "Sales Man"]);
</script>

<style></style>
