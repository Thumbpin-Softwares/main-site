@extends('layout.visitor', [
    'title' => 'Real Estate Video Ads Agency in Gurgaon',
    'description' => 'Thumbpin produces cinematic real estate ad films, drone walkthroughs and property promo reels that help builders and brokers sell faster.',
    'keywords' => 'real estate video ads, real estate ad films, drone walkthroughs, property promo videos, real estate marketing agency Gurgaon, real estate marketing agency Gurugram, builder video ads, broker promo videos, property video production Gurgaon, real estate advertising agency',
    'footer_black' => 'footer-black',
])

@section('head')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://www.youtube.com">
<link rel="preconnect" href="https://i.ytimg.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
<noscript>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</noscript>
<link rel="stylesheet" href="@asset('css/app.css')">

<style>
:root { --film-red: #E50914; }

/* ---- Animations ---- */
@keyframes filmMarquee { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }

.kinetic-text { white-space: nowrap; animation: filmMarquee 20s linear infinite; will-change: transform; }

/* ---- Hero outline text ----
   Matches the strategy/branding heroes: stroke thins on small screens so the
   letterforms don't close up at clamp()'s lower bound. */
.hero-title-outline { color: transparent; -webkit-text-stroke: 2px rgba(255,255,255,0.6); }
@media (max-width: 767px) { .hero-title-outline { -webkit-text-stroke-width: 1px; } }

/* Users who ask the OS to stop motion get the hero's end state immediately. */
@media (prefers-reduced-motion: reduce) {
    *, *::before, *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
        scroll-behavior: auto !important;
    }
    .animate-hero-reveal { opacity: 1 !important; transform: none !important; }
}

/* ---- Reels watermark ---- */
.reels-section::before {
    content: 'REELS';
    position: absolute; bottom: 50px; left: -20px;
    font-size: 200px;
    font-weight: 700; color: rgba(0,0,0,0.03);
    pointer-events: none; line-height: 1;
}

/* ---- Reel stagger ---- */
.reel-item:nth-child(2),
.reel-item:nth-child(4),
.reel-item:nth-child(6),
.reel-item:nth-child(8) { transform: translateY(30px); }
.reel-item:nth-child(2):hover,
.reel-item:nth-child(4):hover,
.reel-item:nth-child(6):hover,
.reel-item:nth-child(8):hover { transform: translateY(22px); }
@media (max-width: 768px) { .reel-item:nth-child(n) { transform: none !important; } }

/* ---- Reel hover states ---- */
.reel-item .yt-play { opacity: 0; transform: scale(0.8); transition: all 0.4s cubic-bezier(0.165,0.84,0.44,1); }
.reel-item:hover .yt-play { opacity: 1; transform: scale(1); }
.reel-item.is-previewing .yt-play { opacity: 0 !important; }
.reel-item img { transition: transform 0.5s ease; }
.reel-item:hover img { transform: scale(1.08); }
.reel-preview-iframe { position: absolute; inset: 0; width: 100%; height: 100%; border: none; z-index: 1; pointer-events: none; }

/* ---- Reels on touch devices (no hover to reveal the play button) ---- */
@media (hover: none) {
    .reel-item .yt-play { opacity: 1; transform: scale(1); }
    .reel-item:active { transform: scale(0.98) !important; }
}

/* ---- Long-form hover ---- */
.longform-card img { transition: all 0.4s cubic-bezier(0.165,0.84,0.44,1); }
.longform-card:hover img { transform: scale(1.05); }
.longform-card:hover .yt-play { transform: translate(-50%,-50%) scale(1.15) !important; box-shadow: 0 15px 50px rgba(229,9,20,0.5); }
@media (max-width: 1024px) {
    .longform-card { flex-direction: column !important; }
}

/* ---- Diagonal field connector ---- */
.field-diag::after {
    content: ''; display: block;
    width: 30px; height: 1px;
    position: absolute; right: 0; bottom: 0;
    transform-origin: left center;
    transform: translateX(100%) rotate(-35deg);
}
.field-diag-light::after { background-color: #999; }
.field-diag-dark::after  { background-color: #444; }

/* ---- Input bottom-border underlines ---- */
.lead-input {
    border: none;
    border-bottom: 1px solid #2a2a2a;
}
.lead-input:focus { border-bottom-color: #E50914; }

.cta-input {
    border: none;
    border-bottom: 1px solid #ccc;
}
.cta-input:focus  { border-bottom-color: #E50914; }

/* ---- CTA button ---- */
.cta-btn { clip-path: polygon(5% 0, 100% 0, 95% 100%, 0 100%); }

/* ---- Collapsible strip ---- */
#re-lead-strip[aria-expanded="true"] .rls-icon svg { transform: rotate(180deg); color: #E50914; }
#re-lead-strip:hover .rls-cta { background: #c40812; }
.rls-icon svg { transition: transform 0.35s ease, color 0.25s; }

.re-lead-form-wrap { overflow: hidden; max-height: 0; opacity: 0; transition: max-height 0.45s ease, opacity 0.35s ease; }
.re-lead-form-wrap.is-open { max-height: 900px; opacity: 1; }

/* ---- Scroll reveal ---- */
.film-reveal { opacity: 0; transform: translateY(30px); transition: all 0.7s ease; }
.film-reveal.visible { opacity: 1; transform: translateY(0); }

/* ---- Lightbox ---- */
.film-lightbox { display: none; opacity: 0; transition: opacity 0.3s ease; }
.film-lightbox.active { display: flex; opacity: 1; }
/* Vertical (reel) videos get a 9:16 frame instead of 16:9 */
.film-lightbox-box.is-vertical {
    aspect-ratio: 9 / 16 !important;
    height: min(78vh, 720px);
    width: auto !important;
    max-width: 100% !important;
}
</style>
{{-- Breadcrumb structured data, matching the trail rendered on the page. Same
     Organization/@id convention as the other service pages. --}}
@php
$bcSchema = [
    '@context' => 'https://schema.org',
    '@graph'   => [[
        '@type' => 'BreadcrumbList',
        '@id'   => url()->current() . '/#breadcrumb',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => config('app.url') . '/'],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('services')],
            ['@type' => 'ListItem', 'position' => 3, 'name' => 'Real Estate Video Ads', 'item' => url()->current()],
        ],
    ]],
];
@endphp
<script type="application/ld+json">
{!! json_encode($bcSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endsection

@section('content')
<main class="bg-film-black text-white font-body overflow-x-hidden">

    {{-- ====================== HERO ====================== --}}
    {{--
        pt-[180px] clears the navbar: `header` is position:absolute; top:0
        (assets/css/style.css), so it floats over this section rather than
        pushing it down. Same hero frame as the strategy/branding pages.
    --}}
    <section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden bg-black px-5 pt-[180px] pb-[110px] max-[767px]:min-h-0 max-[767px]:pt-[150px] max-[767px]:pb-20" id="film-hero">
        <div class="absolute inset-0 z-[1] bg-center bg-cover opacity-40"
             style="background-image:url('{{ asset('assets/img/real-estate-hero.jpg') }}'); filter:saturate(0.6) contrast(1.1);"></div>
        <div class="absolute inset-0 z-[2] bg-black/60"></div>
        <div class="absolute inset-0 z-[2]" style="background:radial-gradient(ellipse at center,transparent 30%,#000 85%);"></div>
        {{-- Brand-red bloom behind the wordmark, so the hero reads as ours and not
             as a generic grey photo wash. --}}
        <div aria-hidden="true" class="pointer-events-none absolute inset-0 z-[2]"
             style="background:radial-gradient(ellipse 55% 45% at 50% 42%,rgba(229,9,20,0.20),transparent 70%);"></div>

        <div class="relative z-[3] mx-auto max-w-[900px] text-center">
            <p class="m-0 mb-6 text-[10px] font-bold uppercase tracking-[4px] text-film-red opacity-0 animate-hero-reveal [animation-delay:150ms] max-[575px]:tracking-[3px]">
                Real Estate &mdash; Video Production
            </p>

            <h1 class="m-0 mb-6 text-[clamp(44px,9vw,110px)] font-extrabold uppercase leading-[0.92] tracking-[-2px] text-white opacity-0 translate-y-[30px] animate-hero-reveal [animation-delay:300ms]">
                Real Estate <span class="hero-title-outline">Video Ads</span>
            </h1>

            <p class="mx-auto m-0 mb-10 max-w-[620px] text-[18px] font-light leading-[1.7] text-[#a8a8a8] opacity-0 animate-hero-reveal [animation-delay:600ms] max-[575px]:mb-8 max-[575px]:text-[16px]">
                From high-fashion model walkthroughs to precise, high-end editing, we produce premium video ads engineered to grab attention and sell properties faster.
            </p>

            {{-- The page's whole job is lead capture, so the hero now offers the
                 primary action instead of ending on stats. Both targets already
                 exist further down the page. --}}
            <div class="mb-12 flex flex-wrap items-center justify-center gap-4 opacity-0 animate-hero-reveal [animation-delay:750ms] max-[575px]:mb-10 max-[575px]:gap-3">
                <a href="#re-lead-strip" id="re-hero-cta"
                   class="inline-flex min-h-[48px] items-center justify-center bg-film-red px-9 py-3 text-[13px] font-bold uppercase tracking-[1.5px] text-white no-underline transition-[background-color,transform] duration-200 hover:bg-[#c40812] hover:-translate-y-0.5 active:translate-y-0 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-film-red max-[575px]:px-7 max-[575px]:text-[12px]">
                    Start A Project
                </a>
                <a href="#sec-reels"
                   class="inline-flex min-h-[48px] items-center justify-center border border-solid border-white/30 px-9 py-3 text-[13px] font-bold uppercase tracking-[1.5px] text-white no-underline transition-[background-color,border-color,transform] duration-200 hover:border-white/60 hover:bg-white/10 hover:-translate-y-0.5 active:translate-y-0 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-white max-[575px]:px-7 max-[575px]:text-[12px]">
                    See The Work
                </a>
            </div>

            {{--
                A 3-up grid rather than a wrapping flex row: the old 50px flex gap
                broke to 2 + 1 on narrow phones and left the third stat stranded.
                Hairline rules do the separating the wide gap used to do.
            --}}
            <div class="mx-auto grid max-w-[560px] grid-cols-3 opacity-0 animate-hero-reveal [animation-delay:900ms]">
                @foreach([['50+','Projects Filmed'],['20+','Brokers Served'],['200+','Shooting Hours']] as $i => [$n,$l])
                <div class="px-2 text-center {{ $i > 0 ? 'border-l border-solid border-white/15' : '' }}">
                    <div class="text-[42px] font-black leading-none text-film-red max-[767px]:text-[30px]">{{ $n }}</div>
                    <div class="mt-2 text-[11px] uppercase leading-[1.4] tracking-[2px] text-[#8a8a8a] max-[575px]:text-[9px] max-[575px]:tracking-[1px]">{{ $l }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ====================== KINETIC DIVIDER ====================== --}}
    <div class="bg-film-red py-[15px] overflow-hidden">
        <div class="kinetic-text font-bold text-[50px] text-black/20">
            REELS • SHORTS • ADS • INSTAGRAM • YOUTUBE • PERFORMANCE • SOCIAL •
            REELS • SHORTS • ADS • INSTAGRAM • YOUTUBE • PERFORMANCE • SOCIAL •
        </div>
    </div>

    {{--
        Visible breadcrumb, mirroring the BreadcrumbList schema in @section('head').

        Sits after the kinetic divider rather than directly under the hero: this
        page's <main> is bg-film-black, and the partial is styled for a light
        background, so it needs the white band the content half of the page opens
        with. The divider above it is only ~80px tall, so the trail still lands
        near the top of the page.
    --}}
    <div class="bg-white">
        @include('inc.breadcrumb', [
            'trail' => [
                ['Home',     route('home')],
                ['Services', route('services')],
                ['Real Estate Video Ads', null],
            ],
            'container' => 'max-w-[1300px] px-3',
        ])
    </div>

    {{-- ====================== REELS ====================== --}}
    <section class="pt-[40px] pb-[60px] bg-white relative overflow-hidden reels-section" id="sec-reels">
        <div class="max-w-[1300px] mx-auto px-3 max-[768px]:px-3">
            <div class="film-reveal mb-[30px]">
                <p class="text-[11px] font-bold uppercase tracking-[3px] text-film-red mb-[15px]">What It Is — 01 — Short-Form Videos</p>
                <h2 class="font-bold uppercase leading-[1.1] text-black mb-[15px]" style="font-size:clamp(36px,5vw,56px)">Scroll-Stopping<br>Short Content</h2>
                <p class="text-[16px] text-[#555] max-w-[500px] leading-[1.6]">Fast-paced vertical videos tailored for real estate. Capture attention instantly and generate quick leads.</p>
            </div>

            <div class="grid grid-cols-4 gap-2 mt-[60px] max-[1024px]:grid-cols-3 max-[768px]:grid-cols-2 max-[768px]:gap-3">
                @php
                $reels = [
                    ['id'=>'-8fH8d6S1Bs','title'=>'County Center Cout', 'sub'=>'Commercial Content'],
                    ['id'=>'iqq0wHrYodA','title'=>'Yashika Group',       'sub'=>'Featured Reel'],
                    ['id'=>'_Dd1WU4yNvk','title'=>'Gaurs Real Estate',   'sub'=>'Branded Ad'],
                    ['id'=>'AtbeokcSRW0','title'=>'Cinematic Reel',      'sub'=>'Photoshoot'],
                    ['id'=>'vHdLpqGBSHc','title'=>'Creator Reel',        'sub'=>'UGC Content'],
                    ['id'=>'LYPCywc-0J8','title'=>'Elan Presidential',   'sub'=>'Ultra Luxury Real Estate Content'],
                    ['id'=>'LnahKtDOZII','title'=>'Platinum Park',       'sub'=>'Commercial Content'],
                    ['id'=>'tgKWcHg76GU','title'=>'SS Cendana',         'sub'=>'UGC Content'],
                ];
                @endphp

                @foreach($reels as $reel)
                <div class="reel-item film-reveal relative rounded-[20px] overflow-hidden bg-black cursor-pointer transition-[transform,box-shadow] duration-[400ms] hover:-translate-y-2 hover:shadow-[0_20px_50px_rgba(0,0,0,0.5)]"
                     data-video-id="{{ $reel['id'] }}">
                    <div class="relative" style="padding-bottom:177.77%">
                        <div class="yt-facade absolute inset-0 flex items-center justify-center">
                            <img src="https://img.youtube.com/vi/{{ $reel['id'] }}/hqdefault.jpg"
                                 alt="{{ $reel['title'] }}" loading="lazy" decoding="async"
                                 class="w-full h-full object-cover">
                            <div class="yt-play absolute z-[3] w-[50px] h-[50px] bg-film-red/85 rounded-full flex items-center justify-center">
                                <svg class="w-[18px] h-[18px] fill-white ml-[2px]" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 px-[15px] pb-[15px] pt-[25px] z-[2]"
                         style="background:linear-gradient(to top,rgba(0,0,0,0.9) 0%,transparent 100%)">
                        <h4 class="text-[13px] font-bold text-white m-0 mb-1 uppercase tracking-[0.5px]">{{ $reel['title'] }}</h4>
                        <span class="text-[10px] text-[#888] uppercase tracking-[1px]">{{ $reel['sub'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ====================== LONG-FORM ====================== --}}
    <section class="py-[60px] bg-white" id="sec-longform">
        <div class="max-w-[1300px] mx-auto px-3 max-[768px]:px-3">
            <div class="film-reveal mb-[30px]">
                <p class="text-[11px] font-bold uppercase tracking-[3px] text-film-red mb-[15px]">What It Is — 02 — Long-Form Videos</p>
                <h2 class="font-bold uppercase leading-[1.1] text-black mb-[15px]" style="font-size:clamp(36px,5vw,56px)">Cinematic<br>Property Walkthroughs</h2>
                <p class="text-[16px] text-[#555] max-w-[500px] leading-[1.6]">Cinematic tours and detailed walkthroughs. Designed to keep buyers watching and drive deep engagement.</p>
            </div>

            @php
            $longforms = [
                ['id'=>'iaLUi722K9g','img'=>'long-1.jpg','alt'=>'Luxury Flat Walkthrough',      'title'=>'LUXURY FLATS WALKTHROUGH',       'desc'=>'A guided cinematic tour of premium flats. We capture the layout, finishes, and amenities to give buyers a true sense of the space.','tag'=>'Property Tour','rev'=>false],
                ['id'=>'4Fw2xtyUIWs','img'=>'long-2.jpg','alt'=>'Commercial Project Walkthrough','title'=>'Commercial Project Walkthrough', 'desc'=>'A guided tour through the commercial space showcasing the design, floor plans, and modern infrastructure designed to maximize footfall and business visibility.','tag'=>'Drone & Aerial','rev'=>true],
                ['id'=>'-_522mOv58w','img'=>'long-3.jpg','alt'=>'Plotted Land Walkthrough',      'title'=>'Plotted Land Walkthrough',       'desc'=>'A guided walkthrough of a plotted land development — boundaries, roads and surroundings captured to give buyers a clear sense of the plot.','tag'=>'Property Tour','rev'=>false],
            ];
            @endphp

            <div class="flex flex-col gap-[50px]">
                @foreach($longforms as $lf)
                <div class="longform-card film-reveal flex {{ $lf['rev'] ? 'flex-row-reverse' : '' }} items-stretch rounded-[20px] overflow-hidden transition-all duration-[400ms] hover:border-film-red/30 hover:-translate-y-1 hover:shadow-[0_30px_60px_rgba(0,0,0,0.12)] cursor-pointer max-[1024px]:!flex-col"
                     data-video-id="{{ $lf['id'] }}">
                    <div class="flex-1 relative min-h-[320px] max-[1024px]:flex-none max-[1024px]:h-[260px] max-[1024px]:min-h-0">
                        <div class="yt-facade absolute inset-0 overflow-hidden">
                            <img src="{{ asset('assets/img/'.$lf['img']) }}" alt="{{ $lf['alt'] }}" loading="lazy" decoding="async" class="w-full h-full object-cover">
                            <div class="yt-play absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-16 h-16 bg-film-red rounded-full flex items-center justify-center transition-all duration-[400ms]">
                                <svg class="w-6 h-6 fill-white ml-[3px]" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex-[0.6] p-[50px_40px] flex flex-col justify-center max-[1024px]:p-[20px_15px_25px]">
                        <h3 class="text-[24px] font-bold text-black mb-[10px] uppercase tracking-[-0.5px] max-[768px]:text-[18px]">{{ $lf['title'] }}</h3>
                        <p class="text-[14px] text-[#555] leading-[1.6] mb-[25px] max-[768px]:text-[13px]">{{ $lf['desc'] }}</p>
                        <span class="inline-block px-3 py-1 bg-black/5 border border-[#ddd] text-[11px] text-[#555] uppercase tracking-[1px] w-fit">{{ $lf['tag'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ====================== LEAD FORM STRIP ====================== --}}
    <section>

        {{-- Title --}}
        <div class="bg-film-dark text-center" style="padding-top:50px; padding-bottom:50px;">
            <div class="max-w-[1300px] mx-auto px-5 max-[768px]:px-3">
                <h2 class="font-bold uppercase flex flex-col tracking-[1px] text-white m-0 leading-[1.25]">
                    <span style="font-size:clamp(22px,3vw,38px);">Model Shooting. Editing. Distribution.</span>
                    <span class="text-film-red" style="font-size:clamp(14px,1.8vw,22px); font-family:'Poppins',sans-serif;">We Already Have You Covered.</span>
                </h2>
            </div>
        </div>

        {{-- Clickable strip --}}
        <button type="button" id="re-lead-strip"
                class="flex items-center justify-between w-full bg-film-dark border-none px-[60px] py-6 cursor-pointer max-[768px]:flex-col max-[768px]:items-center max-[768px]:gap-[14px] max-[768px]:px-6 max-[768px]:py-[22px]"
                style="border-bottom:1px solid #1e1e1e;"
                aria-expanded="false">
            <span class="font-body text-[12px] font-semibold uppercase tracking-[2px] text-film-red max-[768px]:text-[10px]">Start A Project Now</span>
            <span class="rls-cta font-body text-[13px] font-bold uppercase tracking-[1.5px] text-white bg-film-red px-9 py-3 transition-colors duration-200 max-[768px]:text-[12px] max-[768px]:px-7 max-[768px]:py-3">Let's Get Started</span>
            <span class="rls-icon">
                <svg class="w-[22px] h-[22px] text-[#555] max-[768px]:w-5 max-[768px]:h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M6 9l6 6 6-6"/>
                </svg>
            </span>
        </button>

        {{-- Collapsible form body --}}
        <div id="re-lead-form-wrap" class="re-lead-form-wrap bg-[#0d0d0d] border-b border-[#1e1e1e]">
            <div class="max-w-[1300px] mx-auto px-5 max-[768px]:px-3">
                <form id="re-lead-form" class="flex flex-col py-12" novalidate>
                    @include('inc.spam-fields')
                    @csrf

                    <div class="grid grid-cols-2 gap-x-[60px] max-[768px]:grid-cols-1">
                        <div class="field-diag field-diag-dark relative">
                            <input type="text" name="name" placeholder="Your Name" required
                                   class="lead-input w-full bg-transparent text-white font-body text-[14px] py-4 px-1 outline-none transition-colors duration-300 placeholder:text-[#444] appearance-none">
                        </div>
                        <div class="field-diag field-diag-dark relative">
                            <input type="text" name="company_name" placeholder="Company Name" required
                                   class="lead-input w-full bg-transparent text-white font-body text-[14px] py-4 px-1 outline-none transition-colors duration-300 placeholder:text-[#444] appearance-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-x-[60px] max-[768px]:grid-cols-1">
                        <div class="field-diag field-diag-dark relative">
                            <input type="email" name="email" placeholder="Email Address" required
                                   class="lead-input w-full bg-transparent text-white font-body text-[14px] py-4 px-1 outline-none transition-colors duration-300 placeholder:text-[#444] appearance-none">
                        </div>
                        <div class="field-diag field-diag-dark relative">
                            <input type="tel" name="mobile" placeholder="Contact Number" required
                                   class="lead-input w-full bg-transparent text-white font-body text-[14px] py-4 px-1 outline-none transition-colors duration-300 placeholder:text-[#444] appearance-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-1">
                        <div class="field-diag field-diag-dark relative">
                            <input type="text" name="requirement" placeholder="Requirement" required
                                   class="lead-input w-full bg-transparent text-white font-body text-[14px] py-4 px-1 outline-none transition-colors duration-300 placeholder:text-[#444] appearance-none">
                        </div>
                    </div>

                    <div class="flex items-end gap-4 max-[768px]:flex-col">
                        <div class="field-diag field-diag-dark relative flex-1 max-[768px]:w-full">
                            <input type="text" name="marketing_budget" placeholder="Marketing Budget (e.g. ₹25,000)" required
                                   class="lead-input w-full bg-transparent text-white font-body text-[14px] py-4 px-1 outline-none transition-colors duration-300 placeholder:text-[#444] appearance-none">
                        </div>
                        <button type="submit" id="re-lead-submit"
                                class="inline-flex items-center gap-2 bg-film-red text-white border-none px-7 py-[14px] font-body text-[12px] font-bold uppercase tracking-[1.5px] cursor-pointer transition-colors duration-300 whitespace-nowrap flex-shrink-0 mb-[1px] hover:bg-[#b00710] disabled:opacity-60 disabled:cursor-not-allowed max-[768px]:w-full max-[768px]:justify-center">
                            <span class="btn-text">Send Enquiry</span>
                            <span class="btn-loading" style="display:none;">Sending…</span>
                        </button>
                    </div>

                    <div id="re-lead-success" class="mt-5 px-[18px] py-[14px] bg-[rgba(0,200,100,0.08)] border-l-[3px] border-[#00c864] text-[#00c864] text-[14px]" style="display:none;"></div>
                    <div id="re-lead-error"   class="mt-5 px-[18px] py-[14px] bg-[rgba(229,9,20,0.08)] border-l-[3px] border-film-red text-[#ff4d4d] text-[14px]" style="display:none;"></div>
                </form>
            </div>
        </div>
    </section>

    {{-- ====================== BEYOND THE SHOOT ====================== --}}
    <section class="py-[60px] bg-white" id="sec-beyond">
        <div class="max-w-[1300px] mx-auto px-3 max-[768px]:px-3">
            {{-- Editorial two-column header: the claim on the left, the qualifier
                 set against it on the right rather than stacked underneath, so the
                 headline keeps the full width of its own line. --}}
            <div class="film-reveal mb-[50px] flex items-end justify-between gap-10 max-[1024px]:flex-col max-[1024px]:items-start max-[1024px]:gap-5 max-[1024px]:mb-[36px]">
                <div>
                    <p class="text-[11px] font-bold uppercase tracking-[3px] text-film-red mb-[15px]">03 — Beyond The Shoot</p>
                    <h2 class="font-bold uppercase leading-[1.1] text-black m-0" style="font-size:clamp(36px,5vw,56px)">We Don't Just Shoot.<br>We Build The Machine.</h2>
                </div>
                <p class="m-0 max-w-[400px] text-[16px] leading-[1.7] text-[#555] max-[1024px]:max-w-[500px]">
                    We're not just a camera crew we build the full system that turns these videos into actual leads.
                </p>
            </div>

            {{--
                Two parts of one machine, so they sit side by side as equal-weight
                cards instead of stacking as two full-width bands. The whole card is
                the link: a 26px text link was the only hit target before, and the
                surrounding card was dead space.
            --}}
            @php
            $beyond = [
                [
                    'n'     => '01',
                    'kicker'=> 'Where The Traffic Lands',
                    'title' => 'Landing Page Design',
                    'desc'  => "We build custom, high-converting landing pages tailored to the property or the agent's brand — built to turn video views into enquiries.",
                    'href'  => route('application-development'),
                ],
                [
                    'n'     => '02',
                    'kicker'=> 'How The Traffic Arrives',
                    'title' => 'Meta & Google Ads',
                    'desc'  => 'We set up the targeting and optimization to put these videos in front of actual buyers and sellers, not just random views.',
                    'href'  => route('performance-marketing-agency'),
                ],
            ];
            @endphp

            <div class="grid grid-cols-2 gap-6 max-[900px]:grid-cols-1 max-[900px]:gap-5">
                {{-- film-reveal lives on the wrapper, not the card: it animates
                     `transform` on the element it sits on, which would otherwise
                     override the card's hover lift once revealed. --}}
                @foreach($beyond as $b)
                <div class="film-reveal">
                <a href="{{ $b['href'] }}"
                   class="beyond-card group relative flex h-full flex-col overflow-hidden rounded-[20px] border border-solid border-[#e6e6e6] bg-white p-[44px_40px_38px] no-underline transition-[transform,border-color,box-shadow] duration-[400ms] hover:-translate-y-1 hover:border-film-red/40 hover:shadow-[0_30px_60px_rgba(0,0,0,0.10)] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-film-red max-[768px]:p-[30px_22px_28px]">

                    {{-- Oversized index sits behind the copy as texture rather than
                         as a second thing to read — hence aria-hidden and the very
                         low contrast. It warms toward red on hover. --}}
                    <span aria-hidden="true"
                          class="pointer-events-none absolute -top-2 right-5 text-[130px] font-black leading-none text-black/[0.05] transition-colors duration-[400ms] group-hover:text-film-red/[0.10] max-[768px]:text-[90px]">{{ $b['n'] }}</span>

                    <p class="relative m-0 mb-5 text-[11px] font-bold uppercase tracking-[2px] text-film-red">{{ $b['kicker'] }}</p>

                    {{-- The short red rule is the only ornament in the card; it does
                         the separating a border or a filled panel would otherwise do. --}}
                    <span aria-hidden="true" class="relative mb-6 block h-[3px] w-[42px] bg-film-red transition-[width] duration-[400ms] group-hover:w-[64px]"></span>

                    <h3 class="relative m-0 mb-4 text-[30px] font-bold uppercase leading-[1.15] tracking-[-0.5px] text-black max-[768px]:text-[22px]">{{ $b['title'] }}</h3>
                    <p class="relative m-0 mb-[32px] max-w-[46ch] text-[15px] leading-[1.75] text-[#555]">{{ $b['desc'] }}</p>
                </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ====================== LOGISTICS ====================== --}}
    <section class="py-[60px] bg-white" id="sec-logistics">
        <div class="max-w-[1300px] mx-auto px-3 max-[768px]:px-3">
            <div class="film-reveal mb-[30px]">
                <p class="text-[11px] font-bold uppercase tracking-[3px] text-film-red mb-[15px]">04 — Transparency & Logistics</p>
                <h2 class="font-bold uppercase leading-[1.1] text-black mb-[15px]" style="font-size:clamp(36px,5vw,56px)">No Surprises.<br>Just Clarity.</h2>
                <p class="text-[16px] text-[#555] max-w-[500px] leading-[1.6]">Addressing the logistics upfront so there are no surprises later here's exactly how travel works.</p>
            </div>

            <div class="film-reveal bg-white border-l-[3px] border-film-red p-[50px] max-[768px]:p-[25px_15px]">
                <h3 class="font-bold text-black leading-[1.3] mb-[30px] max-w-[700px]"
                    style="font-size:clamp(24px,3vw,34px)">
                    We shoot anywhere in India travel and accommodation expenses for our team are covered by the client.
                </h3>
                <div class="flex flex-col gap-[18px]">
                    @foreach([
                        ['ok','22c55e','rgba(34,197,94,0.15)','+','<strong class="text-black">Delhi NCR and beyond</strong> our production team covers Delhi, Gurgaon, Noida, the rest of the NCR region, and anywhere else in India.'],
                        ['note','E50914','rgba(229,9,20,0.15)','−','<strong class="text-black">Travel and accommodation expenses</strong> for our team and equipment, within NCR or outside, are covered by the client.'],
                        ['note','E50914','rgba(229,9,20,0.15)','−','<strong class="text-black">Travel arrangements for our team and equipment</strong> to and from the shoot location are arranged by the client.'],
                    ] as [$type,$color,$bg,$icon,$text])
                    <div class="flex items-start gap-[14px] text-[15px] text-[#555] leading-[1.6]">
                        <span class="flex-shrink-0 w-[22px] h-[22px] rounded-full flex items-center justify-center text-[12px] font-bold mt-[2px]"
                              style="background:{{ $bg }}; color:#{{ $color }}">{{ $icon }}</span>
                        <span>{!! $text !!}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ====================== CTA ====================== --}}
    <section class="py-[70px] px-5 max-[768px]:px-3 bg-white text-center relative overflow-hidden" id="sec-cta">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] pointer-events-none"
             style="background:radial-gradient(circle,rgba(229,9,20,0.05),transparent 70%)"></div>

        <div class="max-w-[1300px] mx-auto film-reveal relative z-[1]">
            <h2 class="font-bold uppercase mb-5 leading-none text-black" style="font-size:clamp(36px,6vw,72px)">
                Your Story.<br><span class="text-film-red">Our Lens.</span>
            </h2>
            <p class="text-[18px] text-[#555] mb-10 max-w-[500px] mx-auto">
                Ready to create something cinematic? Let's bring your brand to life with world-class production.
            </p>

            <form id="cta-lead-form" class="max-w-[700px] mx-auto text-left relative z-[1]" novalidate>
                @include('inc.spam-fields')
                @csrf
                <input type="hidden" name="url" value="{{ Request::url() }}">

                <div class="flex flex-wrap gap-10 mb-[35px] max-[768px]:gap-6">
                    @foreach([
                        ['text','name','Your Name','flex-[1_1_calc(50%-20px)] max-[768px]:flex-[1_1_100%]'],
                        ['text','company_name','Company Name','flex-[1_1_calc(50%-20px)] max-[768px]:flex-[1_1_100%]'],
                        ['email','email','Email Address','flex-[1_1_calc(50%-20px)] max-[768px]:flex-[1_1_100%]'],
                    ] as [$type,$name,$ph,$cls])
                    <div class="field-diag field-diag-light relative {{ $cls }}">
                        <input type="{{ $type }}" name="{{ $name }}" placeholder="{{ $ph }}" required
                               class="cta-input w-full py-4 px-1 bg-transparent text-black font-body text-[14px] outline-none transition-colors duration-[400ms] placeholder:text-[#888]">
                    </div>
                    @endforeach

                    <div class="field-diag field-diag-light relative flex-[1_1_calc(50%-20px)] max-[768px]:flex-[1_1_100%]">
                        <input type="tel" name="mobile" placeholder="Contact Number" required
                               class="cta-input w-full py-4 px-1 bg-transparent text-black font-body text-[14px] outline-none transition-colors duration-[400ms] placeholder:text-[#888]">
                    </div>

                    <div class="field-diag field-diag-light relative flex-[1_1_calc(50%-20px)] max-[768px]:flex-[1_1_100%]">
                        <input type="text" name="marketing_budget" placeholder="Marketing Budget (e.g. ₹25,000)"
                               class="cta-input w-full py-4 px-1 bg-transparent text-black font-body text-[14px] outline-none transition-colors duration-[400ms] placeholder:text-[#888]">
                    </div>

                    <div class="field-diag field-diag-light relative flex-[1_1_100%]">
                        <input type="text" name="requirement" placeholder="Requirement" required
                               class="cta-input w-full py-4 px-1 bg-transparent text-black font-body text-[14px] outline-none transition-colors duration-[400ms] placeholder:text-[#888]">
                    </div>
                </div>

                <div class="text-center mt-[10px]">
                    <button type="submit" id="cta-lead-submit"
                            class="cta-btn group inline-flex items-center gap-3 px-[45px] py-[18px] bg-film-red text-white font-bold text-[14px] uppercase tracking-[2px] border-none cursor-pointer transition-all duration-[400ms] hover:bg-black hover:-translate-y-[3px] hover:shadow-[0_15px_40px_rgba(0,0,0,0.25)] disabled:opacity-60 disabled:cursor-not-allowed">
                        <span class="btn-text">Start Your Project</span>
                        <span class="btn-loading" style="display:none;">Sending…</span>
                        <svg class="w-[18px] h-[18px] transition-transform duration-300 group-hover:translate-x-[5px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
                    </button>
                </div>

                <div id="cta-lead-success" class="mt-5 px-[18px] py-[14px] bg-[rgba(0,200,100,0.08)] border-l-[3px] border-[#00c864] text-[#00c864] text-[14px]" style="display:none;"></div>
                <div id="cta-lead-error"   class="mt-5 px-[18px] py-[14px] bg-[rgba(229,9,20,0.08)] border-l-[3px] border-film-red text-[#ff4d4d] text-[14px]" style="display:none;"></div>
            </form>
        </div>
    </section>

    {{-- ====================== LIGHTBOX ====================== --}}
    <div class="film-lightbox fixed inset-0 z-[99999] bg-black/95 items-center justify-center p-10 max-[768px]:p-5" id="filmLightbox">
        <div class="film-lightbox-box relative w-full max-w-[900px] aspect-video bg-black" id="filmLightboxBox">
            <button class="absolute -top-[45px] right-0 bg-transparent border-none text-white text-[30px] cursor-pointer w-10 h-10 flex items-center justify-center transition-all duration-300 hover:text-film-red hover:rotate-90"
                    id="filmLightboxClose">&times;</button>
            <iframe id="filmLightboxIframe" allow="autoplay; encrypted-media" allowfullscreen class="w-full h-full border-none"></iframe>
        </div>
    </div>

</main>
@endsection

@section('script')
<script>
(function() {
    'use strict';

    // ===== LIGHTBOX =====
    var lightbox = document.getElementById('filmLightbox');
    var lightboxIframe = document.getElementById('filmLightboxIframe');
    var lightboxClose = document.getElementById('filmLightboxClose');
    var lightboxBox   = document.getElementById('filmLightboxBox');

    // Hover previews only make sense with a real pointer; touch gets tap-to-open.
    var canHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

    function openLightbox(videoId, vertical) {
        lightboxBox.classList.toggle('is-vertical', !!vertical);
        lightboxIframe.src = 'https://www.youtube.com/embed/' + videoId +
            '?autoplay=1&rel=0&playsinline=1';
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        lightbox.classList.remove('active');
        lightboxIframe.src = '';
        lightboxBox.classList.remove('is-vertical');
        document.body.style.overflow = '';
    }

    lightboxClose.addEventListener('click', closeLightbox);
    lightbox.addEventListener('click', function(e) { if (e.target === lightbox) closeLightbox(); });
    document.addEventListener('keydown', function(e) { if (e.key === 'Escape') closeLightbox(); });

    // ===== LONG-FORM click-to-play =====
    document.querySelectorAll('.longform-card[data-video-id]').forEach(function(card) {
        card.addEventListener('click', function() {
            var vid = this.getAttribute('data-video-id');
            if (vid) openLightbox(vid);
        });
    });

    // ===== REELS hover-to-preview =====
    document.querySelectorAll('.reel-item[data-video-id]').forEach(function(card) {
        var vid   = card.getAttribute('data-video-id');
        var thumb = card.querySelector('.yt-facade');
        var iframe = null;

        // Touch devices: the muted inline preview can't autoplay and isn't tappable,
        // so open the reel in the lightbox (9:16) instead.
        if (!canHover) {
            card.addEventListener('click', function() {
                if (vid) openLightbox(vid, true);
            });
            return;
        }

        function startPreview() {
            if (iframe || !vid) return;
            iframe = document.createElement('iframe');
            iframe.className = 'reel-preview-iframe';
            iframe.src = 'https://www.youtube.com/embed/' + vid +
                '?autoplay=1&controls=0&loop=1&playlist=' + vid + '&rel=0&modestbranding=1&playsinline=1';
            iframe.setAttribute('allow', 'autoplay; encrypted-media');
            thumb.appendChild(iframe);
            card.classList.add('is-previewing');
        }

        function stopPreview() {
            if (!iframe) return;
            iframe.remove(); iframe = null;
            card.classList.remove('is-previewing');
        }

        card.addEventListener('mouseenter', startPreview);
        card.addEventListener('mouseleave', stopPreview);
        card.addEventListener('click', function() { iframe ? stopPreview() : startPreview(); });
    });

    // ===== SCROLL REVEAL =====
    var reveals = document.querySelectorAll('.film-reveal');
    if ('IntersectionObserver' in window) {
        var io = new IntersectionObserver(function(entries) {
            entries.forEach(function(e) {
                if (e.isIntersecting) { e.target.classList.add('visible'); io.unobserve(e.target); }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
        reveals.forEach(function(el) { io.observe(el); });
    } else {
        reveals.forEach(function(el) { el.classList.add('visible'); });
    }

    // ===== SHARED FORM SUBMIT HANDLER =====
    var FORM_URL = '{{ route('project-form') }}';

    function handleFormSubmit(formId, btnId, successId, errorId, stripEl, wrapEl) {
        var form      = document.getElementById(formId);
        var btn       = document.getElementById(btnId);
        var successEl = document.getElementById(successId);
        var errorEl   = document.getElementById(errorId);
        if (!form) return;

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            btn.disabled = true;
            btn.querySelector('.btn-text').style.display    = 'none';
            btn.querySelector('.btn-loading').style.display = '';
            successEl.style.display = 'none';
            errorEl.style.display   = 'none';

            var data = new FormData(form);

            fetch(FORM_URL, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': data.get('_token'), 'Accept': 'application/json' },
                body: data,
            })
            .then(function(res) { return res.json(); })
            .then(function(json) {
                btn.disabled = false;
                btn.querySelector('.btn-text').style.display    = '';
                btn.querySelector('.btn-loading').style.display = 'none';
                if (json.success) {
                    successEl.textContent   = json.message;
                    successEl.style.display = 'block';
                    form.reset();
                    if (stripEl && wrapEl) {
                        setTimeout(function() {
                            wrapEl.classList.remove('is-open');
                            stripEl.setAttribute('aria-expanded', 'false');
                            successEl.style.display = 'none';
                        }, 3000);
                    }
                } else {
                    errorEl.textContent   = json.message || 'Something went wrong.';
                    errorEl.style.display = 'block';
                }
            })
            .catch(function() {
                btn.disabled = false;
                btn.querySelector('.btn-text').style.display    = '';
                btn.querySelector('.btn-loading').style.display = 'none';
                errorEl.textContent   = 'Something went wrong. Please try again.';
                errorEl.style.display = 'block';
            });
        });
    }

    // ===== TOP COLLAPSIBLE STRIP =====
    var topStrip = document.getElementById('re-lead-strip');
    var topWrap  = document.getElementById('re-lead-form-wrap');
    topStrip.addEventListener('click', function() {
        var isOpen = topWrap.classList.toggle('is-open');
        topStrip.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });
    handleFormSubmit('re-lead-form', 're-lead-submit', 're-lead-success', 're-lead-error', topStrip, topWrap);

    // The hero CTA points at the strip, so expand the form on arrival instead of
    // dropping the visitor on a collapsed bar they have to click again.
    var heroCta = document.getElementById('re-hero-cta');
    if (heroCta) {
        heroCta.addEventListener('click', function() {
            if (!topWrap.classList.contains('is-open')) {
                topWrap.classList.add('is-open');
                topStrip.setAttribute('aria-expanded', 'true');
            }
        });
    }

    // ===== BOTTOM CTA FORM =====
    handleFormSubmit('cta-lead-form', 'cta-lead-submit', 'cta-lead-success', 'cta-lead-error', null, null);

})();
</script>
@endsection
