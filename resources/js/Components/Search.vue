<script setup lang="ts">
import Dialog from 'primevue/dialog';
import Button from "primevue/button"
import InputText from "primevue/inputtext"
import {ref} from "vue";

const visible = ref<boolean>(false)
</script>

<template>
    <div>
        <Button @click="visible=true" icon="pi pi-search" severity="secondary"></Button>
    </div>
    <teleport to="body" c>
        <Dialog v-model:visible="visible" modal header="Search" :style="{ width: '25rem' }">
            <InputText></InputText>
            <Button class="ml-2">search</Button>
        </Dialog>
    </teleport>
</template>

<style scoped>

</style>
