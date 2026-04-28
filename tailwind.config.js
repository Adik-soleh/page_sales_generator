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
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                heading: ['Outfit', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    50: '#FAFAF9',
                    100: '#F5F5F4',
                    200: '#E7E5E4',
                    300: '#D6D3D1',
                    400: '#A8A29E',
                    500: '#78716C',
                    600: '#57534E',
                    700: '#44403C',
                    800: '#292524',
                    900: '#1C1917',
                },
                accent: {
                    300: '#D6D3D1',
                    400: '#A8A29E',
                    500: '#78716C',
                },
                surface: '#FFFFFF',
                warm: '#FAFAF9',
                dark: {
                    DEFAULT: '#1C1917',
                    50: '#F5F5F4',
                    100: '#E7E5E4',
                    200: '#D6D3D1',
                    300: '#A8A29E',
                    400: '#78716C',
                    500: '#57534E',
                    600: '#44403C',
                    700: '#292524',
                    800: '#1C1917',
                    900: '#0C0A09',
                },
            },
            boxShadow: {
                'soft': '0 1px 3px rgba(0, 0, 0, 0.06), 0 1px 2px rgba(0, 0, 0, 0.04)',
                'glow': '0 4px 14px rgba(0, 0, 0, 0.08)',
                'card': '0 1px 3px rgba(0,0,0,0.04), 0 1px 2px rgba(0,0,0,0.03)',
                'card-hover': '0 4px 12px rgba(0, 0, 0, 0.06)',
            },
            borderRadius: {
                'xl': '1rem',
                '2xl': '1.5rem',
            },
            animation: {
                'fade-in': 'fadeIn 0.3s ease-out',
                'slide-up': 'slideUp 0.3s ease-out',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                slideUp: {
                    '0%': { opacity: '0', transform: 'translateY(10px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
            },
        },
    },

    plugins: [forms],
};
