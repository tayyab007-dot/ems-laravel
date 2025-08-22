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
            colors: {
                primary: {
                    DEFAULT: '#FF6B00',
                    light: '#FF8533',
                    lighter: '#FFB380',
                    dark: '#CC5500'
                },
                neutral: {
                    DEFAULT: '#1A1A1A',
                    light: '#4A4A4A',
                    lighter: '#8A8A8A',
                    dark: '#000000'
                },
                surface: {
                    DEFAULT: '#FFFFFF',
                    alt: '#F8F9FA',
                    dark: '#F0F2F5'
                }
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
