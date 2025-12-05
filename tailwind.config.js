import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Outfit', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                bd: {
                    green: '#006A4E',
                    red: '#F42A41',
                    'green-light': '#008562',
                    'green-dark': '#00503b',
                    'red-light': '#ff4d61',
                    'red-dark': '#d61a30',
                }
            },
        },
    },

    plugins: [forms],
};
