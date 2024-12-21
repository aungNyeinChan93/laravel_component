import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary:"red",
                secondary:{
                    "100":"#E2E2D5",
                    "200":"#888883",
                    "300":"#F2F2F2",
                    "400":"#F2F2F2",
                    "500":"#F2F2F2",
                    "600":"#F2F2F2",
                    "700":"#F2F2F2",
                    "800":"#F2F2F2",
                    "900":"#F2F2F2",
                },
                danger: {
                    "100":"#E2E2D5",
                    "200":"#888883",
                    "300":"#F2F2F2",
                    "400":"#F2F2F2",
                    "500":"#F2F2F2",
                    "600":"#F2F2F2",
                    "700":"#F2F2F2",
                    "800":"#F2F2F2",
                    "900":"#F2F2F2",
                },
            }
        },
    },
    plugins: [],
};
