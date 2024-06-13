<script setup lang="ts">
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import {Head, usePage} from '@inertiajs/vue3';
import VendorLayout from "@/Layouts/VendorLayout.vue";
import DefaultLayout from "@/Layouts/DefaultLayout.vue"
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {VNode} from "vue";

defineProps<{
    mustVerifyEmail?: boolean;
    status?: string;
}>();
defineOptions({
    // layout: [DefaultLayout, VendorLayout]
    layout: (h: any, page: VNode) => h(DefaultLayout, () => h(page.props!.auth.user.id ===3 ? VendorLayout : AdminLayout, page))
})
</script>

<template>
    <Head title="Profile" />
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <UpdateProfileInformationForm
                        :must-verify-email="mustVerifyEmail"
                        :status="status"
                        class="max-w-xl"
                    />
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <UpdatePasswordForm class="max-w-xl" />
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <DeleteUserForm class="max-w-xl" />
                </div>
            </div>
        </div>
</template>
