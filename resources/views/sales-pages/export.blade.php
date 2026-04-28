<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $salesPage->product_name }} — Sales Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'Inter',sans-serif;line-height:1.6;-webkit-font-smoothing:antialiased}
        h1,h2,h3{font-family:'Outfit',sans-serif}
        img{max-width:100%}
        a{text-decoration:none}

        /* === Color Themes === */
        @php $tmpl = $salesPage->template; @endphp

        @if($tmpl === 'bold')
        :root{--bg:#1C1917;--bg2:#0C0A09;--text:#fff;--text2:#A8A29E;--accent:#F97316;--accent2:#FBBF24;--card:#292524;--border:#44403C}
        body{background:var(--bg);color:var(--text)}
        @elseif($tmpl === 'minimal')
        :root{--bg:#fff;--bg2:#FAFAF9;--text:#1C1917;--text2:#78716C;--accent:#F97316;--accent2:#1C1917;--card:#fff;--border:#E7E5E4}
        body{background:var(--bg);color:var(--text)}
        @else
        :root{--bg:#FFFBF5;--bg2:#fff;--text:#1C1917;--text2:#78716C;--accent:#F97316;--accent2:#FBBF24;--card:#fff;--border:#FED7AA}
        body{background:var(--bg);color:var(--text)}
        @endif

        .container{max-width:1100px;margin:0 auto;padding:0 24px}

        /* Hero */
        .hero{padding:100px 24px;text-align:center;position:relative;overflow:hidden;
            @if($tmpl==='bold') background:linear-gradient(135deg,#1C1917,#0C0A09); @elseif($tmpl==='minimal') background:#fff; @else background:linear-gradient(135deg,#FFFBF5,#FFF7ED,#FFEDD5); @endif
        }
        .hero::before{content:'';position:absolute;top:-200px;right:-200px;width:500px;height:500px;background:radial-gradient(circle,rgba(249,115,22,0.12),transparent);border-radius:50%}
        .badge-hero{display:inline-flex;align-items:center;gap:8px;padding:8px 20px;border-radius:999px;font-size:13px;font-weight:600;margin-bottom:32px;
            @if($tmpl==='bold') background:rgba(249,115,22,0.15);color:#FDBA74;border:1px solid rgba(249,115,22,0.2); @elseif($tmpl==='minimal') color:#F97316;letter-spacing:0.1em;text-transform:uppercase; @else background:#FFEDD5;color:#EA580C; @endif
        }
        .badge-hero::before{content:'';width:8px;height:8px;background:var(--accent);border-radius:50%}
        .hero h1{font-weight:800;line-height:1.05;margin-bottom:24px;letter-spacing:-0.02em;
            font-size:clamp(2.5rem,6vw,4.5rem);
            @if($tmpl==='bold') background:linear-gradient(135deg,#fff,#FDBA74);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text; @elseif($tmpl==='minimal') color:var(--text); @else color:var(--text); @endif
        }
        .hero p{font-size:1.2rem;max-width:600px;margin:0 auto 40px;color:var(--text2)}
        .btn{display:inline-flex;align-items:center;justify-content:center;padding:16px 40px;font-size:1.1rem;font-weight:700;border-radius:12px;transition:all 0.3s;cursor:pointer;border:none}
        .btn-primary{background:linear-gradient(135deg,#F97316,#EA580C);color:#fff;box-shadow:0 4px 20px rgba(249,115,22,0.3)}
        .btn-primary:hover{transform:translateY(-2px);box-shadow:0 8px 30px rgba(249,115,22,0.4)}
        @if($tmpl==='bold') .btn-primary{background:linear-gradient(135deg,#F97316,#FBBF24);color:#1C1917} @endif
        @if($tmpl==='minimal') .btn-primary{background:#1C1917;color:#fff;border-radius:8px;box-shadow:none} @endif

        /* Trust */
        .trust{display:flex;flex-wrap:wrap;justify-content:center;gap:24px;margin-top:48px;font-size:14px;color:var(--text2)}
        .trust span{display:flex;align-items:center;gap:6px}
        .trust svg{width:18px;height:18px;color:@if($tmpl==='bold')#FB923C @else #22C55E @endif}

        /* Sections */
        .section{padding:80px 24px}
        .section-alt{background:var(--bg2);@if($tmpl==='bold') border-top:1px solid var(--border);border-bottom:1px solid var(--border) @elseif($tmpl==='minimal') border-top:1px solid var(--border);border-bottom:1px solid var(--border) @endif}
        .section-label{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.12em;color:var(--accent);margin-bottom:12px;display:inline-block;padding:4px 14px;border-radius:999px;
            @if($tmpl==='bold') background:rgba(249,115,22,0.15) @elseif($tmpl==='minimal') padding:0;background:none;color:var(--text2) @else background:#FFEDD5 @endif
        }
        .section-title{font-size:2.2rem;font-weight:700;margin-bottom:16px;color:@if($tmpl==='bold')#fff @else var(--text) @endif}
        .section-center{text-align:center;margin-bottom:56px}
        .description{max-width:800px;margin:0 auto;font-size:1.15rem;color:var(--text2);line-height:1.8}

        /* Benefits */
        .benefits{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:20px;max-width:900px;margin:0 auto}
        .benefit{display:flex;align-items:flex-start;gap:16px;padding:24px;border-radius:16px;
            background:var(--card);
            @if($tmpl==='bold') border:1px solid var(--border) @elseif($tmpl==='minimal') border-bottom:1px solid var(--border);border-radius:0;padding:24px 0 @else box-shadow:0 1px 3px rgba(0,0,0,0.06) @endif
        }
        .benefit-num{width:40px;height:40px;min-width:40px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-weight:700;font-family:'Outfit',sans-serif;
            @if($tmpl==='bold') background:linear-gradient(135deg,#F97316,#FBBF24);color:#1C1917 @elseif($tmpl==='minimal') background:none;color:var(--accent);font-size:1.4rem @else background:linear-gradient(135deg,#FB923C,#EA580C);color:#fff @endif
        }
        .benefit p{color:@if($tmpl==='bold')#E7E5E4 @else var(--text) @endif;font-weight:500;font-size:1.05rem}

        /* Features */
        .features{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:32px;max-width:1000px;margin:0 auto}
        .feature{padding:32px;border-radius:20px;position:relative;overflow:hidden;
            @if($tmpl==='bold') background:var(--card);border:1px solid var(--border) @elseif($tmpl==='minimal') background:none @else background:var(--bg);border:1px solid rgba(249,115,22,0.1) @endif
        }
        .feature-icon{width:56px;height:56px;margin-bottom:20px;border-radius:16px;display:flex;align-items:center;justify-content:center;
            @if($tmpl==='bold') background:rgba(249,115,22,0.12) @elseif($tmpl==='minimal') background:#FFF7ED @else background:linear-gradient(135deg,#FFEDD5,#FED7AA) @endif
        }
        .feature h3{font-size:1.15rem;font-weight:700;margin-bottom:10px;color:@if($tmpl==='bold')#fff @else var(--text) @endif}
        .feature p{color:var(--text2);font-size:0.95rem;line-height:1.7}

        /* Stats */
        .stats{padding:56px 24px;text-align:center;
            @if($tmpl==='bold') background:linear-gradient(135deg,#EA580C,#FBBF24) @else background:linear-gradient(135deg,#F97316,#EA580C) @endif
        }
        .stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:32px;max-width:900px;margin:0 auto}
        .stats-grid div span:first-child{display:block;font-family:'Outfit',sans-serif;font-size:2rem;font-weight:800;color:@if($tmpl==='bold')#1C1917 @else #fff @endif}
        .stats-grid div span:last-child{font-size:0.85rem;color:@if($tmpl==='bold')rgba(28,25,23,0.6) @else rgba(255,255,255,0.7) @endif}
        @if($tmpl==='minimal') .stats{background:#1C1917} .stats-grid div span:first-child{color:#fff} .stats-grid div span:last-child{color:rgba(255,255,255,0.5)} @endif

        /* Testimonial */
        .testimonial{padding:80px 24px;text-align:center;
            @if($tmpl==='bold') background:var(--bg) @else background:var(--bg) @endif
        }
        .stars{display:flex;justify-content:center;gap:4px;margin-bottom:24px;color:#FBBF24}
        .stars svg{width:24px;height:24px}
        .testimonial blockquote{font-size:1.4rem;font-style:italic;max-width:700px;margin:0 auto 24px;line-height:1.6;color:@if($tmpl==='bold')#fff @else var(--text) @endif}
        .testimonial .author{font-size:0.9rem;color:var(--text2)}

        /* Pricing */
        .pricing-card{max-width:480px;margin:0 auto;padding:48px;border-radius:24px;text-align:center;position:relative;overflow:hidden;
            background:var(--card);
            @if($tmpl==='bold') border:2px solid rgba(249,115,22,0.4);box-shadow:0 0 40px rgba(249,115,22,0.1) @elseif($tmpl==='minimal') border:2px solid var(--border) @else border:2px solid #FED7AA;box-shadow:0 4px 20px rgba(249,115,22,0.08) @endif
        }
        .pricing-card::before{content:'';position:absolute;top:0;left:0;right:0;height:4px;background:linear-gradient(90deg,#F97316,#FBBF24,#F97316)}
        .pricing-card .price{font-size:3.5rem;font-family:'Outfit',sans-serif;font-weight:800;color:@if($tmpl==='bold')#fff @else var(--text) @endif;margin:12px 0}
        .pricing-card p{color:var(--text2);margin-bottom:32px;font-size:1.05rem}
        .pricing-card .btn{width:100%}
        .pricing-card small{display:block;margin-top:16px;font-size:0.8rem;color:var(--text2)}

        /* CTA */
        .cta{padding:100px 24px;text-align:center;
            @if($tmpl==='bold') background:linear-gradient(135deg,#0C0A09,#1C1917) @elseif($tmpl==='minimal') background:#fff @else background:linear-gradient(135deg,#1C1917,#292524) @endif
        }
        .cta h2{font-size:2.2rem;font-weight:700;margin-bottom:16px;color:@if($tmpl==='minimal') var(--text) @else #fff @endif}
        .cta p{font-size:1.1rem;margin-bottom:32px;color:@if($tmpl==='minimal') var(--text2) @else #A8A29E @endif}

        footer{padding:32px;text-align:center;font-size:0.85rem;color:var(--text2);
            @if($tmpl==='bold') background:#0C0A09;border-top:1px solid var(--border) @elseif($tmpl==='minimal') border-top:1px solid var(--border) @else background:var(--bg2) @endif
        }

        @media(max-width:768px){
            .stats-grid{grid-template-columns:repeat(2,1fr)}
            .hero h1{font-size:2.2rem}
        }
    </style>
</head>
<body>
    @php $content = $salesPage->generated_content; @endphp

    <section class="hero">
        <div class="badge-hero">{{ $salesPage->product_name }}</div>
        <h1>{{ $content['headline'] ?? '' }}</h1>
        <p>{{ $content['sub_headline'] ?? '' }}</p>
        <a href="#pricing" class="btn btn-primary">{{ $content['call_to_action'] ?? 'Get Started' }} →</a>
        <div class="trust">
            <span><svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg> Free Trial</span>
            <span><svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg> No Credit Card</span>
            <span><svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg> Cancel Anytime</span>
        </div>
    </section>

    <section class="section section-alt">
        <p class="description">{{ $content['description'] ?? '' }}</p>
    </section>

    <section class="section">
        <div class="section-center"><span class="section-label">Benefits</span><h2 class="section-title">Why Choose {{ $salesPage->product_name }}?</h2></div>
        <div class="benefits">
            @foreach(($content['benefits'] ?? []) as $i => $benefit)
            <div class="benefit"><div class="benefit-num">{{ $i + 1 }}</div><p>{{ $benefit }}</p></div>
            @endforeach
        </div>
    </section>

    <section class="section section-alt">
        <div class="section-center"><span class="section-label">Features</span><h2 class="section-title">Everything You Need</h2></div>
        <div class="features">
            @foreach(($content['features_breakdown'] ?? []) as $feature)
            <div class="feature">
                <div class="feature-icon"><svg width="28" height="28" fill="none" stroke="#F97316" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg></div>
                <h3>{{ $feature['title'] ?? '' }}</h3>
                <p>{{ $feature['description'] ?? '' }}</p>
            </div>
            @endforeach
        </div>
    </section>

    <section class="stats">
        <div class="stats-grid">
            <div><span>10K+</span><span>Users</span></div>
            <div><span>99.9%</span><span>Uptime</span></div>
            <div><span>4.9★</span><span>Rating</span></div>
            <div><span>24/7</span><span>Support</span></div>
        </div>
    </section>

    <section class="testimonial">
        <div class="stars">@for($i=0;$i<5;$i++)<svg fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>@endfor</div>
        <blockquote>"{{ $content['social_proof'] ?? '' }}"</blockquote>
        <div class="author">— Happy Customer, Verified Buyer</div>
    </section>

    <section class="section section-alt" id="pricing">
        <div class="section-center"><span class="section-label">Pricing</span><h2 class="section-title">Simple Pricing</h2></div>
        <div class="pricing-card">
            @if($salesPage->price)<div class="price">${{ number_format($salesPage->price, 2) }}</div>@endif
            <p>{{ $content['pricing_display'] ?? '' }}</p>
            <a href="#" class="btn btn-primary">{{ $content['call_to_action'] ?? 'Get Started' }}</a>
            <small>30-day money-back guarantee</small>
        </div>
    </section>

    <section class="cta">
        <h2>Ready to Get Started?</h2>
        <p>Join thousands using {{ $salesPage->product_name }} today.</p>
        <a href="#" class="btn btn-primary">{{ $content['call_to_action'] ?? 'Get Started Now' }} →</a>
    </section>

    <footer>© {{ date('Y') }} {{ $salesPage->product_name }}. All rights reserved.</footer>
</body>
</html>
