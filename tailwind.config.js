import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors:{
                primary: '#1d5226',
                secondary: '#2cb844',
            },
            fontFamily: {
                epundaslab: ['EpundaSlab', 'sans-serif'],
                benguiat: ['Benguiat', 'serif'],
            },
        },
    },

    plugins: [forms, typography],
};
