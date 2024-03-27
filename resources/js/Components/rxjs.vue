<template>
    <div>
        <IconField iconPosition="left">
            <InputIcon>
                <i class="pi pi-search"/>
            </InputIcon>
            <InputText placeholder="Search Prdouct" type="text" v-model="search" class="w-full"/>
        </IconField>
        <div class="bg-black rounded divide-y divide-white flex flex-col">
            <Transition
                enter-active-class="duration-300"
                leave-active-class="duration-700"
                enter-from-class="opacity-0"
                enter-to-class="opacity-100"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <span class="bg-black text-white mb-4" v-if="fetching"
                >Loading...</span
                >
            </Transition>
            <span class="text-white p-2" v-for="product in products">{{
                    product.name
                }}</span>
        </div>
    </div>
</template>

<script setup lang="ts">
import IconField from "primevue/iconfield"
import InputIcon from "primevue/inputicon"
import {ref, watchEffect} from "vue";
import InputText from "primevue/inputtext"
import {from, useSubscription} from "@vueuse/rxjs";
import {ajax} from "rxjs/ajax";
import {
    distinctUntilChanged,
    tap,
    throttleTime,
    debounceTime,
    switchMap,
} from "rxjs";

const search = ref("");
const products = ref([]);
const fetching = ref(false);

defineProps<{
    products: any
}>()
useSubscription(
    from(search)
        .pipe(
            // wait for 300ms before emitting
            debounceTime(300),

            // Ensure the previous value is only emitted once
            distinctUntilChanged(),

            // Start fetching if a distinct value is emitted
            tap((value) => (fetching.value = true)),

            // emit a new value after every 1.5s only
            throttleTime(700),

            // Ignore previous values when new one comes in to make the request
            switchMap((q) =>
                ajax.getJSON(`/api/products?q=${q}`).pipe(
                    tap((data) => {
                        fetching.value = false;
                        products.value = data;
                    }),
                ),
            ),
        )
        .subscribe(),
);
</script>

<style scoped></style>
