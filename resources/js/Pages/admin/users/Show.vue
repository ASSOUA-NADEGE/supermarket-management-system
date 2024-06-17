<script setup lang="ts">
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import InputText from "primevue/inputtext"
import Button from "primevue/button"
import {useForm} from "@inertiajs/vue3";

const {user} = defineProps<{
    user: any
}>()
const form = useForm({
    name: user.name,
    email: user.email,
})
defineOptions({
    layout: [DefaultLayout, AdminLayout]
})
</script>

<template>
    <div class="p-4">
        <h1 class="capitalize">{{user.name}} edit</h1>
        <form class="space-y-4">
            <div class="grid gap-2">
                <label>Name:</label>
                <InputText v-model="form.name"></InputText>
            </div>
            <div class="grid gap-2">
                <label>Email:</label>
                <InputText v-model="form.email"></InputText>
            </div>
            <Button type="submit">Edit</Button>
        </form>
    </div>
</template>

<style scoped>

</style>
