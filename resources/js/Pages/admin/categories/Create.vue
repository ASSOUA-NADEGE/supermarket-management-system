<script setup lang="ts">
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import InputText from "primevue/inputtext"
import Card from "primevue/card"
import Editor from "primevue/editor"
import Button from "primevue/button"
import { useForm} from "@inertiajs/vue3";
defineOptions({
    layout: [DefaultLayout, AdminLayout]
})
const form = useForm({
    name: "",
    description: ""
})

function submit() {
    form.post(route('admin.categories.store'));
}
</script>

<template>
    <div class="p-4">
        <div class="">
            <h3>Create Category</h3>
        </div>
        <Card>
            <template #content>
                <form @submit.prevent="submit" class="space-y-4">
                    <InputText v-model="form.name" placeholder="Category Name" class="w-full"/>
                    <Editor v-model="form.description" editorStyle="height: 320px" placeholder="Category Description"/>
                    <Button type="submit">Save</Button>
                </form>
            </template>
        </Card>
    </div>
</template>

<style scoped>

</style>
