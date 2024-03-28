import { Product } from "@/types";
import { defineStore } from "pinia";
import { computed, reactive } from "vue";
import { pick } from "lodash";

const useCartStore = defineStore("cart", () => {
    interface CartProduct
        extends Pick<Product, "id" | "price" | "name" | "discount"> {
        quantity: number;
    }

    const cart = reactive<Array<CartProduct>>([]);

    const subtotal = computed<number>(() =>
        cart.reduce(
            (total, product) =>
                total +
                Number(
                    ((100 - product.discount) / 100) *
                        product.price *
                        product.quantity,
                ),
            0,
        ),
    );

    const get = (id: string | number) => cart.find((p) => p.id === Number(id));

    const add = (product: Product, quantity: number = 1) => {
        if (!has(product))
            cart.push({
                ...pick(product, ["id", "price", "name", "discount"]),
                quantity,
            });
        else increment(product, quantity);
    };

    const increment = (
        product: Product | CartProduct | number,
        quantity: number = 1,
    ) => {
        if (!has(product)) return;

        const productIndex = cart.findIndex((p) =>
            typeof product === "number"
                ? p.id === product
                : p.id === product.id,
        );

        cart[productIndex].quantity += quantity;
        console.log(
            "the product was incremented",
            productIndex,
            cart[productIndex],
        );
    };

    const decrement = (
        product: Product | CartProduct | number,
        quantity: number = 1,
    ) => {
        if (!has(product)) return;

        const productIndex = cart.findIndex((p) =>
            typeof product === "number"
                ? p.id === product
                : p.id === product.id,
        );

        if (cart[productIndex].quantity <= 1) remove(product);
        else cart[productIndex].quantity -= quantity;
    };

    const has = (product: Product | CartProduct | number) => {
        if (typeof product === "number")
            return cart.some((p) => p.id === product);

        return cart.some((p) => p.id === product.id);
    };

    const remove = (product: Product | CartProduct | number) => {
        if (!has(product)) return;

        let index = cart.findIndex((p) =>
            typeof product === "number"
                ? p.id === product
                : p.id === product.id,
        );

        if (index >= 0) cart.splice(index, 1);
    };

    const clear = () => {
        cart.splice(0, cart.length);
    };

    return {
        /**
         * Get a product from the cart by id
         * */
        get,

        /**
         * Add a product to the cart
         * */
        add,

        /**
         * increment a product in the cart
         * */
        increment,

        /**
         * increment a product in the cart
         * */
        decrement,

        /**
         * Remove a product from the cart
         **/
        remove,

        /**
         * Clear the current cart
         * */
        clear,

        /**
         * Check if a given product exists in the cart
         * */
        has,

        /**
         * The subtotal of the cart items
         * */
        subtotal,

        /**
         * The data present in the cart
         * */
        data: cart,
    };
});

export default useCartStore;
