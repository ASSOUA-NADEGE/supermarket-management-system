<script setup lang="ts">
import Section from "@/Components/Section.vue";
import InputText from "primevue/inputtext";
import InputIcon from "primevue/inputicon";
import IconField from "primevue/iconfield";
</script>

<template>
    <Section variant="primary" class="py-20 ">
        <div class="w-1/4">
            <h2>Order for your product in our supermarket</h2>
        </div>
        <IconField iconPosition="left">
            <InputIcon>
                <i class="pi pi-search"/>
            </InputIcon>
            <InputText placeholder="Search"/>
        </IconField>
    </Section>
</template>

<style scoped>

</style>
