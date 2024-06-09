<script setup lang="ts">
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Card from "primevue/card"
import InputText from "primevue/inputtext"
import FileUpload from "primevue/fileupload"
import Button from "primevue/button"
import Textarea from 'primevue/textarea';

defineOptions({
    layout: [DefaultLayout, AdminLayout]
})
</script>

<template>
    <div class="p-4">
        <Card>
            <template #content>
                <p>Create User</p>
                <div class="flex">
                    <div class="max-w-[12rem]">
                        <h3>profile</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                    <div class="flex-grow grid gap-4">
                        <div class="grid gap-2">
                            <label for="username">Username</label>
                            <InputText id="username" v-model="value" aria-describedby="username-help"/>
                        </div>
                        <div class="grid gap-2">
                            <label>Avatar</label>
                            <FileUpload choose-label="upload image" mode="basic" name="demo[]" url="/api/upload"
                                        accept="image/*" :maxFileSize="1000000" @upload="onUpload"/>
                        </div>
                        <div class="grid gap-2">
                                <label>Bio</label>
                                <Textarea v-model="value" rows="5" cols="30" />
                            </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="grid gap-2">
                                <label for="username">Email</label>
                                <InputText  type="email" id="username" v-model="value" aria-describedby="username-help"/>
                            </div>
                            <div class="grid gap-2">
                                <label for="username">Password</label>
                                <InputText type="password" id="username" v-model="value" aria-describedby="username-help"/>
                            </div>
                        </div>
                        <Button class="w-32"> Create User</Button>
                    </div>
                </div>
            </template>
        </Card>
    </div>
</template>

<style scoped>

</style>
