import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    corePlugins: {
        preflight: false
    },
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            animation: {
                blob: "blob 4s infinite ease-in",
            },
            keyframes: {
              blob: {
                  "0%": {
                      transform: "translate(0px, 0px) scale(1)"
                  },
                  "33%": {
                      transform: "translate(30px, -50px) scale(1.1)"
                  },
                  "66%": {
                      transform: "translate(-20px, 20px) scale(0.9)"
                  },
                  "100%": {
                      transform: "translate(0px, 0px) scale(1)"
                  },
              }
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [],
};
