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
                sans: ['"Plus Jakarta Sans"', 'Inter', ...defaultTheme.fontFamily.sans],
                serif: ['"Playfair Display"', ...defaultTheme.fontFamily.serif],
                playfair: ['"Playfair Display"', ...defaultTheme.fontFamily.serif],
            },
            colors: {
                ryoki: {
                    50: '#FDFBF7',
                    100: '#F9F5E8',
                    200: '#F1E7CA',
                    300: '#E7D5A5',
                    400: '#DEC07C',
                    500: '#D4AF37', // Muted Gold (Primary)
                    600: '#BA942A',
                    700: '#947225',
                    800: '#7B5E26',
                    900: '#674E25',
                },
                sage: {
                    50: '#F6F8F5',
                    100: '#EBF1E9',
                    200: '#D6E1D2',
                    300: '#BBCBA9',
                    400: '#A3B899', // Soft Sage Green (Secondary)
                    500: '#8A9E7F',
                    600: '#6B7E62',
                    700: '#55654E',
                    800: '#465342',
                    900: '#3A4537',
                },
                blush: {
                    50: '#FDF9F9',
                    100: '#FAF1F2',
                    200: '#F3E0E2',
                    300: '#E8C5C8', // Soft Blush Rose
                    400: '#DBA3A8',
                    500: '#CB7C84',
                    600: '#B25D66',
                    700: '#954B53',
                    800: '#7E4249',
                    900: '#693A3F',
                },
            },
        },
    },

    plugins: [forms],
};
