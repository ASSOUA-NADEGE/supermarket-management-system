<script setup lang="ts">
import OverlayPanel from "primevue/overlaypanel";
import ConfirmDialog from "primevue/confirmdialog";
import { useConfirm } from "primevue/useconfirm";
import { ref } from "vue";
import Avatar from "primevue/avatar";
import { Link, router } from "@inertiajs/vue3";

const confirm = useConfirm();

const op = ref();
const toggle = (event: any) => {
    op.value.toggle(event);
};
const confirm1 = () => {
    confirm.require({
        message: "Are you sure you want to logout?",
        header: "Danger Zone",
        icon: "pi pi-info-circle",
        rejectLabel: "Cancel",
        acceptLabel: "Logout",
        rejectClass: "p-button-secondary p-button-outlined",
        acceptClass: "p-button-danger",
        accept: () => {
            router.post("/logout");
        },
        reject: () => {},
    });
};
</script>

<template>
    <div>
        <div class="flex items-center gap-2 cursor-pointer" @click="toggle">
            <p class="capitalize">{{ $page.props.auth.user.name }}</p>
            <Avatar
                :label="$page.props.auth.user.name[0].toUpperCase()"
                shape="circle"
            />
        </div>
        <ConfirmDialog></ConfirmDialog>
        <OverlayPanel ref="op" class="overlow-hidden">
            <template #container>
                <Link
                    href="/profile"
                    class="flex items-center gap-3 px-4 py-2 text-neutral-600 hover:bg-neutral-400/10 text-sm"
                >
                    <i :class="`pi pi-user`"></i>
                    <span>Profile</span>
                </Link>
                <button
                    @click="confirm1()"
                    class="flex items-center gap-3 px-4 py-2 text-neutral-600 hover:bg-neutral-400/10 text-sm"
                >
                    <i :class="`pi pi-sign-out`"></i>
                    <span>Logout</span>
                </button>
            </template>
        </OverlayPanel>
    </div>
</template>

<style scoped></style>
