<script setup lang="ts">
import VendorLayout from "@/Layouts/VendorLayout.vue";
import Divider from "primevue/divider"
import Button from "primevue/button"
import {ref} from "vue"
import Rxjs from "@/Components/rxjs.vue";
import Dropdown from "primevue/dropdown";
import UseCart from "@/Stores/cart"
const cart = UseCart()
const value = ref(0)


defineProps<{
    products: any,
    categories: any
}>()
defineOptions({
    layout: VendorLayout
})
</script>

<template>
    <div class="flex bg-neutral-200">
        <div class="w-2/3 px-2">
            <div class="">
                <div class="flex py-2 gap-2" >
                    <Rxjs :products="products" class="w-full" />
                    <Dropdown :options="$props.categories.map(category =>  category.name)" placeholder="Select Category"  />
                </div>
                <Divider/>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div v-for="product in products">
                    <div class="size-52 bg-white p-4">
                        <img :src="product.image" :alt="product.name"
                             class="object-contain object-center w-full h-full"/>
                    </div>
                    <p class="text-center font-bold truncate">{{ product.name }}</p>
                    <Button class="w-full flex justify-center">Add To Cart</Button>
                </div>
            </div>
        </div>
        <Divider layout="vertical"/>
        <div class="w-1/3 px-2 bg-white">
            <div class="">
                <div class=" ">
                    <div class="flex items-center justify-between">
                        <Button severity="secondary" icon="pi pi-bars"></Button>
                        <p>Cart(4)</p>
                        <Button severity="secondary" icon="pi pi-plus"></Button>
                    </div>
                    <Divider/>
                </div>
                <div>
                    <div class="flex items-center justify-between text-neutral-400 text-sm">
                        <p>Order list #1</p>
                        <p>7 sept 2017 | 17:20:01 </p>
                    </div>
                    <Divider/>
                    <div>
                        <div class="flex items-center relative justify-between">
                            <button class="absolute text-xs -top-1 right-1">x</button>
                            <div class="text-sm">
                                <p class="font-bold">Mens Cotton Jacket</p>
                                <p>56XAF</p>
                                <p>Notes</p>
                            </div>
                            <div class="flex items-center gap-1">
                                <Button @click="value--" severity="secondary" icon="pi pi-minus"></Button>
                                <Button severity="secondary" aria-readonly
                                        class="w-10 h-full flex items-center justify-center bg-neutral-100">{{
                                        value
                                    }}
                                </Button>
                                <Button @click="value++" severity="secondary" icon="pi pi-plus"></Button>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <Divider/>
                    <div class="space-y-4">
                        <div class="text-sm flex justify-between items-center">
                            <span>Subtotal</span>
                            <span>1500XAF</span>
                        </div>
                        <div class="text-sm flex justify-between items-center">
                            <span>Discount(0%)</span>
                            <span>1500XAF</span>
                        </div>
                        <div class="font-bold text-xl flex justify-between items-center">
                            <span>Total</span>
                            <span>1500XAF</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <Button icon="pi pi-print" severity="secondary"></Button>
                            <Button severity="secondary">Cancel</Button>
                            <Button class="flex-grow justify-center">Buy</Button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
