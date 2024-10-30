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
                sans: ['QuincyCF','Figtree', ...defaultTheme.fontFamily.sans],
            },
            spacing: {
                // Widths
                '0': '0',
                '1': '0.25rem',      // 4px
                '3': '0.75rem',      // 12px
                '3.5': '0.875rem',   // 14px
                '4': '1rem',         // 16px
                '5': '1.25rem',      // 20px
                '8': '2rem',         // 32px
                '12': '3rem',        // 48px
                '14': '3.5rem',      // 56px
                '16': '4rem',        // 64px
                '20': '5rem',        // 80px
                '24': '6rem',        // 96px
                '32': '8rem',        // 128px
              },
              colors: {
                Azul01SC: '#293d4e',
                Azul02SC: '#354552',
                MarromSC: '#b9a47a',
                BrancoSC: '#fffffe',
              }
        },
    },

    plugins: [forms],
};
