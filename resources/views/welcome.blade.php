<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SalesForge — AI Sales Page Generator</title>
    <meta name="description" content="Transform your product info into stunning, high-converting sales pages in seconds with AI-powered copywriting.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .welcome-hero {
            background-color: #FAFAF9;
        }
        .welcome-section-alt {
            background-color: #ffffff;
        }
        .welcome-cta {
            background-color: #1C1917;
        }
        .step-num {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1rem;
            color: #fff;
            background-color: #292524;
        }
        .feature-icon-box {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #F5F5F4;
            color: #44403C;
        }
        .feature-card {
            background: #fff;
            border: 1px solid #E7E5E4;
            border-radius: 16px;
            padding: 28px;
            transition: box-shadow 0.2s ease, border-color 0.2s ease;
        }
        .feature-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.06);
            border-color: #D6D3D1;
        }
        .separator-line {
            width: 48px;
            height: 3px;
            background-color: #292524;
            border-radius: 2px;
        }
    </style>
</head>
<body class="font-sans antialiased" style="background-color: #FAFAF9;">

    <!-- Navbar -->
    <nav style="position: fixed; top: 0; width: 100%; background: rgba(250,250,249,0.9); backdrop-filter: blur(8px); border-bottom: 1px solid #E7E5E4; z-index: 50;">
        <div class="max-w-5xl mx-auto px-6" style="height: 64px; display: flex; align-items: center; justify-content: space-between;">
            <a href="/" class="flex items-center gap-2.5" style="text-decoration: none;">
                <img src="{{ asset('logo.png') }}" alt="SalesForge" style="height: 32px; width: auto;" />
                <span class="font-heading" style="font-size: 1.15rem; font-weight: 700; color: #1C1917;">Sales<span style="color: #78716C;">Forge</span></span>
            </a>
            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ route('dashboard') }}" style="display: inline-flex; align-items: center; padding: 10px 24px; background: #1C1917; color: #fff; font-weight: 600; font-size: 0.875rem; border-radius: 10px; text-decoration: none; transition: background 0.2s;">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" style="padding: 8px 16px; color: #57534E; font-weight: 600; font-size: 0.875rem; text-decoration: none; border-radius: 8px; transition: color 0.2s;" onmouseover="this.style.color='#1C1917'" onmouseout="this.style.color='#57534E'">Log In</a>
                    <a href="{{ route('register') }}" style="display: inline-flex; align-items: center; padding: 10px 24px; background: #1C1917; color: #fff; font-weight: 600; font-size: 0.875rem; border-radius: 10px; text-decoration: none; transition: background 0.2s;" onmouseover="this.style.background='#292524'" onmouseout="this.style.background='#1C1917'">Get Started</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="welcome-hero" style="min-height: 100vh; display: flex; align-items: center; padding-top: 64px;">
        <div class="max-w-3xl mx-auto px-6" style="padding: 80px 24px; text-align: center;">

            <p style="font-size: 0.8rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em; color: #78716C; margin-bottom: 24px;">AI-Powered Sales Page Builder</p>

            <h1 class="font-heading" style="font-size: clamp(2.25rem, 5vw, 3.5rem); font-weight: 800; color: #1C1917; line-height: 1.1; letter-spacing: -0.025em; margin-bottom: 24px;">
                Turn product details into<br>ready-to-use sales pages
            </h1>

            <p style="font-size: 1.125rem; color: #57534E; max-width: 520px; margin: 0 auto 40px; line-height: 1.7;">
                Enter your product info, choose a template, and get a complete sales page generated in seconds. Edit, preview, and export as HTML.
            </p>

            <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; margin-bottom: 48px;">
                <a href="{{ route('register') }}" style="display: inline-flex; align-items: center; gap: 8px; padding: 14px 32px; background: #1C1917; color: #fff; font-weight: 600; font-size: 1rem; border-radius: 12px; text-decoration: none; transition: background 0.2s;" onmouseover="this.style.background='#292524'" onmouseout="this.style.background='#1C1917'">
                    Start Creating
                    <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="#how-it-works" style="display: inline-flex; align-items: center; padding: 14px 32px; background: transparent; color: #1C1917; font-weight: 600; font-size: 1rem; border: 2px solid #D6D3D1; border-radius: 12px; text-decoration: none; transition: border-color 0.2s;" onmouseover="this.style.borderColor='#A8A29E'" onmouseout="this.style.borderColor='#D6D3D1'">See How It Works</a>
            </div>

            <!-- Trust Indicators -->
            <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 24px; color: #78716C; font-size: 0.85rem;">
                <div style="display: flex; align-items: center; gap: 6px;">
                    <svg style="width: 16px; height: 16px; color: #57534E;" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    Free to use
                </div>
                <div style="display: flex; align-items: center; gap: 6px;">
                    <svg style="width: 16px; height: 16px; color: #57534E;" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    No credit card
                </div>
                <div style="display: flex; align-items: center; gap: 6px;">
                    <svg style="width: 16px; height: 16px; color: #57534E;" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    Export as HTML
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="welcome-section-alt" id="how-it-works" style="padding: 96px 0;">
        <div class="max-w-5xl mx-auto px-6">
            <div style="margin-bottom: 56px;">
                <p style="font-size: 0.8rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em; color: #78716C; margin-bottom: 12px;">How it works</p>
                <h2 class="font-heading" style="font-size: clamp(1.75rem, 3.5vw, 2.5rem); font-weight: 700; color: #1C1917; margin-bottom: 8px;">Three simple steps</h2>
                <div class="separator-line"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3" style="gap: 40px;">
                <div>
                    <div class="step-num" style="margin-bottom: 20px;">1</div>
                    <h3 class="font-heading" style="font-size: 1.125rem; font-weight: 700; color: #1C1917; margin-bottom: 8px;">Enter Product Details</h3>
                    <p style="color: #78716C; line-height: 1.6; font-size: 0.95rem;">Name, description, features, target audience, and price — that's all the info we need from you.</p>
                </div>

                <div>
                    <div class="step-num" style="margin-bottom: 20px;">2</div>
                    <h3 class="font-heading" style="font-size: 1.125rem; font-weight: 700; color: #1C1917; margin-bottom: 8px;">AI Generates the Page</h3>
                    <p style="color: #78716C; line-height: 1.6; font-size: 0.95rem;">Our system writes headlines, benefits, features, testimonials, pricing sections, and call-to-actions.</p>
                </div>

                <div>
                    <div class="step-num" style="margin-bottom: 20px;">3</div>
                    <h3 class="font-heading" style="font-size: 1.125rem; font-weight: 700; color: #1C1917; margin-bottom: 8px;">Preview & Export</h3>
                    <p style="color: #78716C; line-height: 1.6; font-size: 0.95rem;">See a live preview, tweak any section you want, then export as a standalone HTML file.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section style="padding: 96px 0; background: #FAFAF9;">
        <div class="max-w-5xl mx-auto px-6">
            <div style="margin-bottom: 56px;">
                <p style="font-size: 0.8rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em; color: #78716C; margin-bottom: 12px;">Features</p>
                <h2 class="font-heading" style="font-size: clamp(1.75rem, 3.5vw, 2.5rem); font-weight: 700; color: #1C1917; margin-bottom: 8px;">What's included</h2>
                <div class="separator-line"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3" style="gap: 20px;">
                @php
                $features = [
                    ['icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'title' => 'AI Copywriting', 'desc' => 'Powered by advanced AI models that write natural, persuasive sales copy.'],
                    ['icon' => 'M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6z', 'title' => '3 Design Templates', 'desc' => 'Modern, Bold, and Minimal — choose the style that fits your brand.'],
                    ['icon' => 'M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15', 'title' => 'Section Regeneration', 'desc' => 'Not happy with a headline? Regenerate individual sections with one click.'],
                    ['icon' => 'M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4', 'title' => 'HTML Export', 'desc' => 'Download your page as a standalone HTML file — ready to deploy anywhere.'],
                    ['icon' => 'M15 12a3 3 0 11-6 0 3 3 0 016 0z', 'title' => 'Live Preview', 'desc' => 'See exactly how your sales page looks before publishing or exporting.'],
                    ['icon' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z', 'title' => 'Secure & Private', 'desc' => 'Your data stays yours. Each user can only access their own pages.'],
                ];
                @endphp

                @foreach($features as $f)
                <div class="feature-card">
                    <div class="feature-icon-box" style="margin-bottom: 16px;">
                        <svg style="width: 22px; height: 22px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $f['icon'] }}"/></svg>
                    </div>
                    <h3 class="font-heading" style="font-size: 1rem; font-weight: 700; color: #1C1917; margin-bottom: 6px;">{{ $f['title'] }}</h3>
                    <p style="color: #78716C; line-height: 1.6; font-size: 0.9rem;">{{ $f['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="welcome-cta" style="padding: 80px 0;">
        <div class="max-w-2xl mx-auto px-6 text-center">
            <h2 class="font-heading" style="font-size: clamp(1.75rem, 3.5vw, 2.25rem); font-weight: 700; color: #fff; margin-bottom: 16px;">Ready to build your sales page?</h2>
            <p style="font-size: 1.05rem; color: #A8A29E; margin-bottom: 32px; max-width: 420px; margin-left: auto; margin-right: auto; line-height: 1.6;">Create your first AI-powered sales page in under a minute. No design skills needed.</p>
            <a href="{{ route('register') }}" style="display: inline-flex; align-items: center; gap: 8px; padding: 14px 32px; background: #fff; color: #1C1917; font-weight: 700; font-size: 1rem; border-radius: 12px; text-decoration: none; transition: opacity 0.2s;" onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                Get Started Free
                <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer style="padding: 24px 0; background: #0C0A09; text-align: center;">
        <p style="color: #78716C; font-size: 0.8rem;">© {{ date('Y') }} SalesForge. All rights reserved.</p>
    </footer>

</body>
</html>
