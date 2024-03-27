import { Product } from "@/types";
import { defineStore } from "pinia";
import { computed, reactive } from "vue";
import { pick } from "lodash";

const useCartStore = defineStore("cart", () => {
    interface CartProduct extends Pick<Product, "id" | "price" | "name"> {
        quantity: number;
    }

    const cart = reactive<Array<CartProduct>>([]);

    const subtotal = computed(() =>
        cart.reduce(
            (total, product) =>
                total + Number(product.price * product.quantity),
            0,
        ),
    );

    const get = (id: string | number) => cart.find((p) => p.id === Number(id));

    const add = (product: Product, quantity: number = 1) => {
        if (!has(product))
            cart.push({ ...pick(product, ["id", "price", "name"]), quantity });
        else increment(product, quantity);
    };

    const increment = (
        product: Product | CartProduct | number,
        quantity: number = 1,
    ) => {
        if (typeof product === "number")
            cart.map((p) =>
                p.id === product
                    ? { ...p, quantity: p.quantity + quantity }
                    : p,
            );
        else
            cart.map((p) =>
                p.id === product.id
                    ? { ...p, quantity: p.quantity + quantity }
                    : p,
            );
    };

    const has = (product: Product | CartProduct | number) => {
        if (typeof product === "number")
            return cart.some((p) => p.id === product);

        return cart.some((p) => p.id === product.id);
    };

    const remove = (product: Product | CartProduct | number) => {
        if (!has(product)) return;

        let productToRemove = get(
            typeof product === "number" ? product : product.id,
        ) as CartProduct;
        let index = cart.findIndex((p) => p.id === productToRemove.id);

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
