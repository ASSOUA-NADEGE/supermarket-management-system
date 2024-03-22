<script setup lang="ts">
import Button from "primevue/button"
import {ref, watch} from "vue";

defineProps<{ product: any }>()
const value = ref(0)
watch(value,function (){
    if(value.value < 0){
        value.value = 0
    }
})
</script>

<template>
    <div class="ring ring-neutral-100 p-4">
        <Button severity="secondary" icon="pi pi-heart"></Button>
        <div class="flex justify-center">
            <img :alt="product.name" :src="product.image" class="w-20 h-20 object-contain "/>
        </div>
        <p class="truncate font-bold text-lg">{{product.name}}</p>
        <p class="truncate">{{product.description}}</p>
        <p>${{product.price}}</p>
        <div class="flex justify-between flex-wrap gap-2">
            <div class="flex items-center">
                <Button @click="value--" severity="secondary" icon="pi pi-minus"></Button>
                <div class="w-10 h-full flex items-center justify-center bg-neutral-100">{{value}}</div>
                <Button @click="value++" severity="secondary" icon="pi pi-plus"></Button>
            </div>
            <Button icon="pi pi-fw pi-shopping-cart"></Button>
        </div>
    </div>
</template>

<style scoped>

</style>
