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
                heading: ['"Fraunces"', 'Outfit', ...defaultTheme.fontFamily.serif],
                display: ['"Fraunces"', ...defaultTheme.fontFamily.serif],
                mono: ['"JetBrains Mono"', ...defaultTheme.fontFamily.mono],
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
                lime: {
                    DEFAULT: '#C6FF3C',
                    400: '#D4FF66',
                    500: '#C6FF3C',
                    600: '#A3E034',
                },
                salmon: {
                    DEFAULT: '#FF6B47',
                    400: '#FF8C70',
                    500: '#FF6B47',
                    600: '#E54E29',
                },
                ink: {
                    DEFAULT: '#0E0E10',
                    900: '#0E0E10',
                    800: '#1C1917',
                    700: '#292524',
                },
                ivory: {
                    DEFAULT: '#F4EFE6',
                    50: '#FBF8F2',
                    100: '#F4EFE6',
                    200: '#EDE5D5',
                    300: '#E0D5BD',
                },
                accent: {
                    300: '#D6D3D1',
                    400: '#A8A29E',
                    500: '#78716C',
                },
                surface: '#FFFFFF',
                warm: '#F4EFE6',
                dark: {
                    DEFAULT: '#0E0E10',
                    50: '#F4EFE6',
                    100: '#EDE5D5',
                    200: '#D6D3D1',
                    300: '#A8A29E',
                    400: '#78716C',
                    500: '#57534E',
                    600: '#44403C',
                    700: '#292524',
                    800: '#1C1917',
                    900: '#0E0E10',
                },
            },
            boxShadow: {
                'soft': '0 1px 3px rgba(14,14,16,0.06), 0 1px 2px rgba(14,14,16,0.04)',
                'glow': '0 4px 14px rgba(14,14,16,0.08)',
                'card': '0 2px 0 0 #0E0E10',
                'card-hover': '0 4px 0 0 #0E0E10',
                'brutal': '4px 4px 0 0 #0E0E10',
                'brutal-lg': '6px 6px 0 0 #0E0E10',
                'brutal-lime': '4px 4px 0 0 #C6FF3C',
            },
            borderRadius: {
                'xl': '1rem',
                '2xl': '1.5rem',
            },
            animation: {
                'fade-in': 'fadeIn 0.35s ease-out',
                'slide-up': 'slideUp 0.45s cubic-bezier(0.22, 1, 0.36, 1)',
                'marquee': 'marquee 32s linear infinite',
                'pulse-soft': 'pulseSoft 2.5s ease-in-out infinite',
                'spin-slow': 'spin 12s linear infinite',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                slideUp: {
                    '0%': { opacity: '0', transform: 'translateY(14px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                marquee: {
                    '0%': { transform: 'translateX(0)' },
                    '100%': { transform: 'translateX(-50%)' },
                },
                pulseSoft: {
                    '0%, 100%': { opacity: '1' },
                    '50%': { opacity: '0.65' },
                },
            },
        },
    },

    plugins: [forms],
};
