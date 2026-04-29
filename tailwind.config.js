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
                display: ['Outfit', ...defaultTheme.fontFamily.sans],
                mono: ['"JetBrains Mono"', ...defaultTheme.fontFamily.mono],
            },
            colors: {
                primary: {
                    50: '#F5F3FF',
                    100: '#EDE9FE',
                    200: '#DDD6FE',
                    300: '#C4B5FD',
                    400: '#A78BFA',
                    500: '#7B61FF',
                    600: '#6C63FF',
                    700: '#5B4ED4',
                    800: '#4C3FB0',
                    900: '#3B2F8C',
                },
                teal: {
                    DEFAULT: '#00B4D8',
                    50: '#E0FAFE',
                    100: '#B3F0FA',
                    200: '#7DE4F5',
                    300: '#47D4ED',
                    400: '#00C4E8',
                    500: '#00B4D8',
                    600: '#00A9A5',
                    700: '#008B8B',
                    800: '#006D6D',
                    900: '#004D4D',
                },
                ink: {
                    DEFAULT: '#0F172A',
                    900: '#0F172A',
                    800: '#1E293B',
                    700: '#334155',
                    600: '#475569',
                    500: '#64748B',
                    400: '#94A3B8',
                    300: '#CBD5E1',
                },
                ivory: {
                    DEFAULT: '#F8FAFC',
                    50: '#FFFFFF',
                    100: '#F8FAFC',
                    200: '#F1F5F9',
                    300: '#E2E8F0',
                },
                accent: {
                    300: '#CBD5E1',
                    400: '#94A3B8',
                    500: '#64748B',
                },
                surface: '#FFFFFF',
                warm: '#F8FAFC',
                dark: {
                    DEFAULT: '#0F172A',
                    50: '#F8FAFC',
                    100: '#F1F5F9',
                    200: '#E2E8F0',
                    300: '#CBD5E1',
                    400: '#94A3B8',
                    500: '#64748B',
                    600: '#475569',
                    700: '#334155',
                    800: '#1E293B',
                    900: '#0F172A',
                },
                // BeDaie-inspired additions
                violet: {
                    DEFAULT: '#7B61FF',
                    light: '#A78BFA',
                    dark: '#5B4ED4',
                },
                cyan: {
                    DEFAULT: '#00B4D8',
                    light: '#67E8F9',
                    dark: '#0891B2',
                },
                gold: {
                    DEFAULT: '#F59E0B',
                    light: '#FCD34D',
                },
            },
            boxShadow: {
                'soft': '0 1px 3px rgba(15,23,42,0.06), 0 1px 2px rgba(15,23,42,0.04)',
                'glow': '0 4px 14px rgba(15,23,42,0.08)',
                'card': '0 1px 3px rgba(15,23,42,0.08), 0 4px 16px rgba(15,23,42,0.04)',
                'card-hover': '0 8px 30px rgba(15,23,42,0.12), 0 2px 8px rgba(15,23,42,0.06)',
                'purple': '0 4px 14px rgba(123,97,255,0.25)',
                'purple-lg': '0 8px 30px rgba(123,97,255,0.35)',
                'teal': '0 4px 14px rgba(0,180,216,0.25)',
            },
            borderRadius: {
                'xl': '1rem',
                '2xl': '1.5rem',
                '3xl': '2rem',
            },
            animation: {
                'fade-in': 'fadeIn 0.5s ease-out',
                'slide-up': 'slideUp 0.6s cubic-bezier(0.22, 1, 0.36, 1)',
                'marquee': 'marquee 32s linear infinite',
                'pulse-soft': 'pulseSoft 2.5s ease-in-out infinite',
                'spin-slow': 'spin 12s linear infinite',
                'float': 'float 6s ease-in-out infinite',
                'gradient': 'gradient 8s ease infinite',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                slideUp: {
                    '0%': { opacity: '0', transform: 'translateY(20px)' },
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
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-10px)' },
                },
                gradient: {
                    '0%, 100%': { backgroundPosition: '0% 50%' },
                    '50%': { backgroundPosition: '100% 50%' },
                },
            },
            backgroundImage: {
                'gradient-primary': 'linear-gradient(135deg, #7B61FF, #00B4D8)',
                'gradient-primary-hover': 'linear-gradient(135deg, #6C63FF, #0891B2)',
                'gradient-dark': 'linear-gradient(135deg, #0F172A, #1E293B)',
                'gradient-surface': 'linear-gradient(135deg, #F8FAFC, #EDE9FE)',
            },
        },
    },

    plugins: [forms],
};
