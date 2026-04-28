<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $salesPage->product_name }} — Sales Page</title>

    <style>
        /* Hide Alpine/Regenerate UI elements in the final exported file */
        button[title="Regenerate"] { display: none !important; }
        .group:hover > button[title="Regenerate"] { display: none !important; }
    </style>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['"Fraunces"', 'Outfit', 'serif'],
                        display: ['"Fraunces"', 'serif'],
                        mono: ['"JetBrains Mono"', 'monospace'],
                    },
                    colors: {
                        primary: { 50: '#FAFAF9', 100: '#F5F5F4', 200: '#E7E5E4', 300: '#D6D3D1', 400: '#A8A29E', 500: '#78716C', 600: '#57534E', 700: '#44403C', 800: '#292524', 900: '#1C1917' },
                        lime: { DEFAULT: '#C6FF3C', 400: '#D4FF66', 500: '#C6FF3C', 600: '#A3E034' },
                        salmon: { DEFAULT: '#FF6B47', 400: '#FF8C70', 500: '#FF6B47', 600: '#E54E29' },
                        ink: { DEFAULT: '#0E0E10', 900: '#0E0E10', 800: '#1C1917', 700: '#292524' },
                        ivory: { DEFAULT: '#F4EFE6', 50: '#FBF8F2', 100: '#F4EFE6', 200: '#EDE5D5', 300: '#E0D5BD' },
                        accent: { 300: '#D6D3D1', 400: '#A8A29E', 500: '#78716C' },
                        surface: '#FFFFFF',
                        warm: '#F4EFE6',
                        dark: { DEFAULT: '#0E0E10', 50: '#F4EFE6', 100: '#EDE5D5', 200: '#D6D3D1', 300: '#A8A29E', 400: '#78716C', 500: '#57534E', 600: '#44403C', 700: '#292524', 800: '#1C1917', 900: '#0E0E10' },
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
                    borderRadius: { 'xl': '1rem', '2xl': '1.5rem' },
                    animation: {
                        'fade-in': 'fadeIn 0.35s ease-out',
                        'slide-up': 'slideUp 0.45s cubic-bezier(0.22, 1, 0.36, 1)',
                        'marquee': 'marquee 32s linear infinite',
                        'pulse-soft': 'pulseSoft 2.5s ease-in-out infinite',
                        'spin-slow': 'spin 12s linear infinite',
                    },
                    keyframes: {
                        fadeIn: { '0%': { opacity: '0' }, '100%': { opacity: '1' } },
                        slideUp: { '0%': { opacity: '0', transform: 'translateY(14px)' }, '100%': { opacity: '1', transform: 'translateY(0)' } },
                        marquee: { '0%': { transform: 'translateX(0)' }, '100%': { transform: 'translateX(-50%)' } },
                        pulseSoft: { '0%, 100%': { opacity: '1' }, '50%': { opacity: '0.65' } },
                    },
                }
            }
        }
    </script>

    <style type="text/tailwindcss">
        @import url('https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300..900;1,9..144,300..900&family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap');
        
        @layer base {
            html { scroll-behavior: smooth; }
            body {
                @apply bg-ivory text-ink font-sans;
                background-image:
                    radial-gradient(at 12% 8%, rgba(198,255,60,0.18) 0px, transparent 45%),
                    radial-gradient(at 88% 0%, rgba(255,107,71,0.12) 0px, transparent 50%),
                    radial-gradient(at 50% 100%, rgba(14,14,16,0.05) 0px, transparent 55%);
                background-attachment: fixed;
            }
            h1, h2, h3, h4, h5, h6 { @apply font-heading; font-feature-settings: "ss01", "ss02"; }
            ::selection { background: #C6FF3C; color: #0E0E10; }
        }

        @layer components {
            .btn-primary {
                @apply inline-flex items-center justify-center px-6 py-3 bg-ink text-ivory font-semibold rounded-full
                border-2 border-ink shadow-brutal hover:translate-x-[-2px] hover:translate-y-[-2px] hover:shadow-brutal-lg
                active:translate-x-0 active:translate-y-0 active:shadow-[2px_2px_0_0_#0E0E10] transition-all duration-150 ease-out focus:outline-none focus:ring-4 focus:ring-lime/40;
            }
            .btn-accent {
                @apply inline-flex items-center justify-center px-6 py-3 bg-lime text-ink font-bold rounded-full
                border-2 border-ink shadow-brutal hover:translate-x-[-2px] hover:translate-y-[-2px] hover:shadow-brutal-lg
                active:translate-x-0 active:translate-y-0 active:shadow-[2px_2px_0_0_#0E0E10] transition-all duration-150 ease-out focus:outline-none focus:ring-4 focus:ring-lime/40;
            }
            .btn-secondary {
                @apply inline-flex items-center justify-center px-6 py-3 bg-ivory text-ink font-semibold rounded-full
                border-2 border-ink hover:bg-lime hover:translate-x-[-2px] hover:translate-y-[-2px] hover:shadow-brutal transition-all duration-150 ease-out focus:outline-none focus:ring-4 focus:ring-ink/20;
            }
            .btn-danger {
                @apply inline-flex items-center justify-center px-4 py-2 bg-salmon text-ink font-bold rounded-full
                border-2 border-ink hover:bg-salmon-600 hover:text-white transition-all duration-150 ease-out focus:outline-none focus:ring-4 focus:ring-salmon/40;
            }
            .btn-ghost {
                @apply inline-flex items-center justify-center px-4 py-2 text-ink/70 hover:text-ink hover:bg-lime/40 rounded-full border-2 border-transparent hover:border-ink transition-all duration-150 ease-out;
            }
            .card {
                @apply bg-ivory-50 rounded-2xl border-2 border-ink shadow-brutal hover:shadow-brutal-lg hover:translate-x-[-2px] hover:translate-y-[-2px] transition-all duration-150 ease-out;
            }
            .card-flat { @apply bg-ivory-50 rounded-2xl border-2 border-ink; }
            .card-dark { @apply bg-ink text-ivory rounded-2xl border-2 border-ink shadow-brutal-lime; }
            .input-field {
                @apply w-full px-4 py-3 bg-ivory-50 border-2 border-ink rounded-xl text-ink font-medium placeholder-ink/40 focus:bg-lime/20 focus:ring-0 focus:border-ink focus:outline-none transition-all duration-150 ease-out;
            }
            .label-text { @apply block text-xs font-bold text-ink mb-2 uppercase tracking-[0.12em]; }
            .stat-card {
                @apply bg-ivory-50 rounded-2xl p-5 border-2 border-ink shadow-brutal hover:shadow-brutal-lg hover:translate-x-[-2px] hover:translate-y-[-2px] transition-all duration-150;
            }
            .badge { @apply inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider border border-ink; }
            .badge-primary { @apply badge bg-lime text-ink; }
            .badge-accent  { @apply badge bg-salmon text-ink; }
            .badge-mono    { @apply badge bg-ink text-ivory border-ink; }
            .eyebrow { @apply inline-flex items-center gap-2 text-xs font-mono font-semibold uppercase tracking-[0.18em] text-ink/70; }
            .eyebrow::before { content: ""; @apply inline-block w-6 h-[2px] bg-ink/70; }
            .marquee-track { @apply flex w-max animate-marquee; }
            .grain { position: relative; }
            .grain::after {
                content: ""; position: absolute; inset: 0; pointer-events: none; opacity: 0.06; mix-blend-mode: multiply;
                background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='120' height='120'><filter id='n'><feTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='2' stitchTiles='stitch'/><feColorMatrix values='0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.7 0'/></filter><rect width='100%' height='100%' filter='url(%23n)'/></svg>");
            }
            .cut-tr { clip-path: polygon(0 0, 100% 0, 100% calc(100% - 32px), calc(100% - 32px) 100%, 0 100%); }
            .sticker { @apply inline-flex items-center gap-1.5 rounded-full bg-lime border-2 border-ink px-3 py-1 text-xs font-bold uppercase tracking-wider rotate-[-3deg]; }
            .h-display { font-family: 'Fraunces', serif; font-weight: 500; letter-spacing: -0.04em; line-height: 0.95; font-variation-settings: "SOFT" 50, "WONK" 1, "opsz" 144; }
            .h-display em { font-style: italic; font-weight: 400; font-variation-settings: "SOFT" 100, "WONK" 1; color: #FF6B47; }
        }

        ::-webkit-scrollbar { width: 10px; height: 10px; }
        ::-webkit-scrollbar-track { @apply bg-ivory-100; }
        ::-webkit-scrollbar-thumb { @apply bg-ink rounded-full border-2 border-ivory-100; }
        ::-webkit-scrollbar-thumb:hover { @apply bg-ink-700; }
    </style>
</head>
<body>
    @php $content = $salesPage->generated_content; @endphp

    @if($salesPage->template === 'bold')
        @include('sales-pages.templates.bold', ['content' => $content, 'salesPage' => $salesPage])
    @elseif($salesPage->template === 'minimal')
        @include('sales-pages.templates.minimal', ['content' => $content, 'salesPage' => $salesPage])
    @else
        @include('sales-pages.templates.modern', ['content' => $content, 'salesPage' => $salesPage])
    @endif
</body>
</html>
