<script setup lang="ts">
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Card from "primevue/card"
import InputText from "primevue/inputtext"
import InputNumber from "primevue/inputnumber";
import Editor from 'primevue/editor';
import FileUpload from 'primevue/fileupload';
import Button from "primevue/button"
import {useForm} from "@inertiajs/vue3";
import {useToast} from "primevue/usetoast";
import Fieldset from "primevue/fieldset";
import Dropdown from "primevue/dropdown";

const onAdvancedUpload = () => {
    toast.add({severity: 'info', summary: 'Success', detail: 'File Uploaded', life: 3000});
};
defineOptions({
    layout: [DefaultLayout, AdminLayout]
})
defineProps<{
    categories: any
}>()

const form = useForm({
    name: '',
    price: 0,
    code: '',
    sku: '',
    description: '',
    image: '',
    category_id: 1
})
</script>

<template>
    <div class="p-4">
        <div class="flex items-center justify-between">
            <p>Create Product</p>
        </div>
        <Card>
            <template #content>
                <div class="flex gap-4">
                    <div class="w-2/3 space-y-4">
                        <InputText placeholder="Product Name" class="w-full"/>
                        <div class="w-full grid grid-cols-3 gap-4">
                            <InputText placeholder="Price"/>
                            <InputText placeholder="Product Code"/>
                            <InputText placeholder="Product SKU"/>
                        </div>
                        <Editor editorStyle="height: 320px" placeholder="Product Description"/>
                        <div class="card">
                            <Toast/>
                            <FileUpload name="demo[]" url="/api/upload" @upload="onAdvancedUpload($event)"
                                        :multiple="true" accept="image/*" :maxFileSize="1000000">
                                <template #empty>
                                    <p>Drag and drop files to here to upload.</p>
                                </template>
                            </FileUpload>
                        </div>
                    </div>
                    <div class="w-1/3 space-y-4">
                        <Fieldset legend="Category">
                            <Dropdown v-model="form.category_id" :options="categories" optionLabel="category"
                                      placeholder="select category" class="w-full">
                                <template #value="slotProps">
                                    <div v-if="slotProps.value" class="flex align-items-center">
                                        <div>{{ slotProps.value.name }}</div>
                                    </div>
                                    <span v-else>
                                        {{ slotProps.placeholder }}
                                    </span>
                                </template>
                                <template #option="slotProps">
                                    <div class="flex align-items-center">
                                        <div>{{ slotProps.option.name }}</div>
                                    </div>
                                </template>
                            </Dropdown>
                        </Fieldset>
                        <Fieldset legend="Stock">
                            <InputNumber placeholder="select stock" class="w-full"></InputNumber>
                        </Fieldset>
                        <div class="flex gap-2">
                            <Button class="w-full" icon="pi pi-trash" severity="danger" outlined label="Discard"></Button>
                            <Button class="w-full" icon="pi pi-check"  outlined label="Publish"></Button>
                        </div>
                    </div>
                </div>
            </template>
        </Card>
    </div>
</template>

<style scoped>

</style>
