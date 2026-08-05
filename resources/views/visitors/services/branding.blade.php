@extends('layout.visitor', [
    'title' => 'Best Branding Agency in Gurgaon | Brand Identity & Strategy | Thumbpin',
    'description' => 'Thumbpin is a top branding agency in Gurgaon. We craft compelling brand identities, logos, brand guidelines, and brand strategies that make your business unforgettable.',
    'keywords' => 'branding agency gurgaon, brand identity design, logo design agency, brand strategy, brand guidelines, brand naming, creative branding agency india',
    'footer_black' => 'footer-black',
])

@section('head')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
<noscript>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</noscript>
<link rel="stylesheet" href="@asset('css/app.css')">

{{-- The only rule Tailwind has no utility for: -webkit-text-stroke. --}}
<style>
.hero-title-outline { color: transparent; -webkit-text-stroke: 2px rgba(255,255,255,0.6); }
@media (max-width: 767px) { .hero-title-outline { -webkit-text-stroke-width: 1px; } }

/* Inquiry form -- copied verbatim from visitors/services.blade.php so the two
   behave identically. The .is-open max-height drives the accordion; without
   these rules the toggle button does nothing. */
::placeholder { color: #444; }
.svc-inquiry-wrap { overflow: hidden; max-height: 0; opacity: 0; transition: max-height 0.45s ease, opacity 0.35s ease; }
.svc-inquiry-wrap.is-open { max-height: 800px; opacity: 1; }
@media (max-width: 768px) {
    .inquiry-grid { grid-template-columns: 1fr !important; }
}
</style>

{{--
    One source of truth for the FAQs: this array renders the visible <details>
    list further down AND the FAQPage schema below, so the structured data can
    never claim something the page does not actually say -- which is what
    triggers a manual action.

    Organization @id matches /services and /about so all three describe the same
    entity rather than three unrelated ones.
--}}
@php
$brandingFaqs = [
    ['q' => 'How much does branding cost in Gurgaon?',
     'a' => "Cost depends on scope. A logo and basic identity for an early-stage business sits at the lower end, while a full programme — research, naming, complete identity system, and guidelines — is a considerably larger engagement. We scope and quote each project individually after a discovery call, so you are paying for the work you actually need rather than a fixed package with filler in it."],

    ['q' => 'How long does a branding project take?',
     'a' => "A focused identity project typically runs four to six weeks. A full branding programme including research, naming, and guidelines usually takes eight to twelve weeks. The single biggest variable is feedback speed on your side — projects with a clear decision-maker move considerably faster than those routed through a large committee."],

    ['q' => 'What is the difference between a logo and a brand identity?',
     'a' => "A logo is one asset. A brand identity is the entire system it lives inside — colour palette, typography, imagery style, iconography, layout rules, and the guidelines governing how they combine. A logo alone gives you a mark; an identity gives your team the ability to produce consistent, on-brand material without a designer present for every decision."],

    ['q' => 'Do I need a rebrand or just a refresh?',
     'a' => "If your business has fundamentally changed what it does or who it serves, that is a rebrand. If the business is sound but the identity looks dated or has become inconsistent across touchpoints, a refresh is usually sufficient and far less disruptive. We run a brand audit before recommending either, and we will tell you if you do not need the more expensive option."],

    ['q' => 'Do you work with startups and small businesses?',
     'a' => "Yes. A meaningful share of our branding work is for early-stage businesses building their first identity. Scope is matched to your stage — a startup preparing to launch needs a different engagement from a fifteen-year-old company repositioning itself, and we price accordingly."],

    ['q' => 'Will I own the rights to my brand assets?',
     'a' => "Yes. On final payment, full ownership of the approved brand assets transfers to you, along with editable source files and export formats for print and digital use. You are never locked into us to make future changes."],

    ['q' => 'Can you handle marketing after the branding is finished?',
     'a' => "That is the main reason clients come to us rather than a standalone design studio. Thumbpin also delivers digital marketing, SEO, performance marketing, social media, web design, and video production — so the brand strategy carries directly into execution instead of being reinterpreted by an agency that was not in the room when it was written."],

    ['q' => 'Which locations do you take branding clients in?',
     'a' => "We work with clients across Gurgaon, Delhi NCR, and the rest of India. Discovery sessions, presentations, and reviews run just as effectively remotely, and we travel for on-site work where a project genuinely warrants it."],
];

$brandingUrl = url()->current();
$orgId       = config('app.url') . '/#organization';

$brandingSchema = [
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type' => 'Organization',
            '@id'   => $orgId,
            'name'  => 'Thumbpin',
            'url'   => config('app.url') . '/',
        ],
        [
            '@type'       => 'Service',
            '@id'         => $brandingUrl . '/#service',
            'name'        => 'Branding & Brand Identity Design',
            'serviceType' => 'Branding Agency',
            'url'         => $brandingUrl,
            'provider'    => ['@id' => $orgId],
            'areaServed'  => ['@type' => 'City', 'name' => 'Gurugram'],
            'description' => 'Brand identity design, brand strategy, brand guidelines, brand naming and rebranding from Thumbpin, serving Gurgaon and Delhi NCR.',
        ],
        [
            '@type'      => 'FAQPage',
            '@id'        => $brandingUrl . '/#faq',
            'mainEntity' => array_map(fn ($faq) => [
                '@type'          => 'Question',
                'name'           => $faq['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
            ], $brandingFaqs),
        ],
        [
            '@type' => 'BreadcrumbList',
            '@id'   => $brandingUrl . '/#breadcrumb',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => config('app.url') . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('services')],
                ['@type' => 'ListItem', 'position' => 3, 'name' => 'Branding', 'item' => $brandingUrl],
            ],
        ],
    ],
];
@endphp
<script type="application/ld+json">
{!! json_encode($brandingSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endsection

@section('content')
<main class="bg-white font-body overflow-x-hidden">

    {{-- ====================== HERO ====================== --}}
    {{--
        pt-[180px] clears the navbar: `header` is position:absolute; top:0
        (assets/css/style.css), so it floats over this section rather than
        pushing it down.
    --}}
    <section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden bg-black px-5 pt-[180px] pb-[110px] max-[767px]:min-h-0 max-[767px]:pt-[150px] max-[767px]:pb-20">
        <div class="absolute inset-0 z-[1] bg-center bg-cover grayscale contrast-[1.1] opacity-40"
             style="background-image:url('{{ asset('img/services/branding.jpeg') }}');"></div>
        <div class="absolute inset-0 z-[2] bg-black/60"></div>
        <div class="absolute inset-0 z-[2]" style="background:radial-gradient(ellipse at center,transparent 30%,#000 85%);"></div>

        <div class="relative z-[3] mx-auto max-w-[900px] text-center">
            <h1 class="m-0 mb-6 text-[clamp(44px,9vw,110px)] font-extrabold uppercase leading-[0.92] tracking-[-2px] text-white opacity-0 translate-y-[30px] animate-hero-reveal [animation-delay:300ms]">
                Branding <span class="hero-title-outline">Agency</span>
            </h1>

            <p class="mx-auto mb-10 max-w-[600px] text-[18px] font-light leading-[1.7] text-[#999] opacity-0 animate-hero-reveal [animation-delay:600ms]">
                We build brands that mean something. From logo to language, identity to strategy every element crafted with intention and precision.
            </p>

            <div class="flex flex-wrap justify-center gap-[50px] opacity-0 animate-hero-reveal [animation-delay:900ms] max-[767px]:gap-[30px]">
                @foreach([['50+','Brands Built'],['20+','Industries'],['7+','Years Experience']] as [$num, $label])
                <div class="text-center">
                    <div class="text-[42px] font-black leading-none text-film-red max-[767px]:text-[32px]">{{ $num }}</div>
                    <div class="mt-[6px] text-[11px] uppercase tracking-[2px] text-[#666]">{{ $label }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ====================== INTRO ====================== --}}
    <section class="bg-white py-[60px]">
        <div class="mx-auto max-w-[1140px] px-5">
            <h2 class="m-0 mb-[30px] text-center text-[42px] font-bold text-black max-[575px]:text-[32px]">
                Building Brands That People Remember
            </h2>
            <p class="mx-auto m-0 max-w-[900px] text-center text-[18px] leading-[1.8] text-[#666]">
                A brand is more than a logo it's the feeling people get when they hear your name.
                At Thumbpin, we develop brand identities that are rooted in strategy, brought to life through design,
                and built to last across every touchpoint. Whether you're starting from scratch or ready for a rebrand,
                we bring clarity, creativity, and consistency to your story.
            </p>
        </div>
    </section>

    {{-- ====================== SERVICES ====================== --}}
    {{--
        Text-only by design. Stock imagery never matches a client's brand palette,
        so the space goes to crawlable copy instead: each entry carries two
        paragraphs plus a deliverables list, which is what actually earns the page
        its long-tail queries.
    --}}
    <section class="bg-white pb-20" id="branding-services">
        <div class="mx-auto max-w-[1140px] px-5">
            @php
            $services = [
                [
                    'title' => 'Brand Identity Design',
                    'lead'  => "Your visual identity is the first impression your brand makes, and usually the only one you get. We design logos, colour systems, typography hierarchies, and visual languages that feel distinct, consistent, and unmistakably yours across every medium.",
                    'body'  => "A logo on its own is not an identity. We build the entire system around it — how it behaves at 16 pixels on a favicon and at six feet on a hoarding, which colours carry which meaning, how photography is treated, and what the brand looks like when it has to sit beside a competitor. The result is a toolkit your team can actually use without calling a designer every time.",
                    'items' => ['Logo design & lockups', 'Colour palette systems', 'Typography hierarchy', 'Iconography & visual motifs', 'Photography & art direction', 'Stationery & collateral'],
                ],
                [
                    'title' => 'Brand Strategy',
                    'lead'  => "Before design comes direction. We define your brand's positioning, purpose, voice, and values, giving every future decision a foundation to stand on rather than a mood board to guess from.",
                    'body'  => "Our strategy work starts with research: stakeholder interviews, competitor mapping, and audience study. From there we articulate what your brand stands for, who it is genuinely for, and how it should sound. That document becomes the reference every marketing decision is measured against — so your campaigns stop contradicting each other.",
                    'items' => ['Market & competitor research', 'Brand positioning', 'Audience & persona mapping', 'Brand purpose & values', 'Tone of voice framework', 'Messaging architecture'],
                ],
                [
                    'title' => 'Brand Guidelines',
                    'lead'  => "Consistency is what turns a brand into a legacy. We create comprehensive brand guidelines documenting how your brand looks, sounds, and behaves, so every team, vendor, and platform stays aligned.",
                    'body'  => "Most brands do not fail from bad design; they fail from inconsistent application. A guidelines document removes the ambiguity — clear spacing rules, approved and unapproved usage, file formats, digital and print specifications, and writing standards. Hand it to a new agency, a printer, or an intern and the brand still comes out right.",
                    'items' => ['Logo usage rules', 'Clear space & minimum sizes', 'Colour codes (CMYK, RGB, HEX, Pantone)', 'Typography specifications', 'Do & do-not examples', 'Digital and print applications'],
                ],
                [
                    'title' => 'Brand Naming',
                    'lead'  => "The right name carries your brand further than any advertisement ever could. We develop names that are memorable, meaningful, and built for longevity.",
                    'body'  => "Naming is equal parts creative and practical. We generate territories, pressure-test shortlists for pronunciation and unintended meanings, and check trademark and domain viability before you commit. A name that cannot be registered, spelled, or said aloud on a phone call is not a name — it is a liability.",
                    'items' => ['Naming territories & routes', 'Linguistic screening', 'Trademark viability checks', 'Domain & handle availability', 'Tagline development', 'Naming rationale document'],
                ],
                [
                    'title' => 'Rebranding & Brand Refresh',
                    'lead'  => "Brands age. Markets shift. Audiences move on. A considered rebrand realigns your identity with where the business is going, without discarding the equity you have already earned.",
                    'body'  => "We begin with a brand audit to establish what is worth keeping — recognition, colour equity, customer associations — and what is holding you back. Some businesses need a full rebuild; many need a disciplined refresh. We will tell you honestly which one you are, and stage the rollout so nothing breaks mid-transition.",
                    'items' => ['Brand audit & diagnosis', 'Equity assessment', 'Identity evolution', 'Migration & rollout planning', 'Internal launch support', 'Legacy asset transition'],
                ],
            ];
            @endphp

            {{--
                Full-width rows rather than a card grid: five items in two columns
                leaves an orphan, and the deliverables list needs horizontal room
                that a half-width card cannot give it. Title sticks to the left
                rail on desktop while the copy scrolls past it.
            --}}
            <div class="border-0 border-t border-solid border-[#e8e8e8]">
                @foreach($services as $i => $service)
                <article class="group grid grid-cols-1 gap-x-16 gap-y-6 border-0 border-b border-solid border-[#e8e8e8] py-14 lg:grid-cols-12 max-[767px]:py-10">

                    {{-- Left rail: number + title --}}
                    <div class="lg:col-span-4">
                        <div class="lg:sticky lg:top-32">
                            <span class="mb-3 block font-mono text-[12px] font-bold tracking-[1px] text-film-red">
                                {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>
                            <h3 class="m-0 text-[30px] font-extrabold leading-[1.15] tracking-[-0.5px] text-black transition-colors duration-300 group-hover:text-film-red max-[991px]:text-[26px] max-[575px]:text-[23px]">
                                {{ $service['title'] }}
                            </h3>
                        </div>
                    </div>

                    {{-- Right: copy + deliverables --}}
                    <div class="lg:col-span-8">
                        <p class="m-0 mb-5 text-[18px] leading-[1.7] text-[#333] max-[575px]:text-[16px]">
                            {{ $service['lead'] }}
                        </p>
                        <p class="m-0 mb-8 text-[15px] leading-[1.85] text-[#777]">
                            {{ $service['body'] }}
                        </p>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ====================== CTA + Inquiry Form ====================== --}}
    <section id="cta-inquiry" class="bg-black">

        {{-- Top strip: centered heading --}}
        <div class="text-center px-5 pt-[72px] pb-[20px]">
            <p class="text-[18px] tracking-[3px] text-tp-red uppercase font-bold mb-[14px]">Work With Us</p>
            <h2 class="text-[clamp(34px,5vw,60px)] font-black uppercase leading-[1.05] text-white mb-[18px] tracking-[-1.5px]">Ready to Get Started?</h2>
            <p class="text-[16px] text-[#888] max-w-[480px] mx-auto leading-[1.65]">Tell us about your project we'll get back within 24 hours.</p>
        </div>

        {{-- Toggle strip --}}
        <button id="inquire-toggle"
            aria-expanded="false"
            onclick="(function(){
                var wrap = document.getElementById('svc-inquiry-form-wrap');
                var btn  = document.getElementById('inquire-toggle');
                var open = btn.getAttribute('aria-expanded') === 'true';
                if(open){
                    wrap.classList.remove('is-open');
                    btn.setAttribute('aria-expanded','false');
                    btn.querySelector('.btn-label').textContent = 'Inquire Now';
                } else {
                    wrap.classList.add('is-open');
                    btn.setAttribute('aria-expanded','true');
                    btn.querySelector('.btn-label').textContent = 'Close Form';
                }
            })()"
            class="w-full bg-black border-0 border-t border-b border-[#1e1e1e] p-0 cursor-pointer flex items-center justify-between">
            <div class="max-w-[1300px] mx-auto px-5 py-7 flex items-center justify-between w-full gap-6 flex-wrap">
                <div class="text-left">
                    <p class="text-[11px] tracking-[3px] text-tp-red uppercase font-bold mb-[6px]">Start Here</p>
                    <span class="text-[clamp(18px,2.5vw,26px)] font-extrabold text-white uppercase tracking-[-0.5px] block">Let's Get You Onboarded</span>
                </div>
                <div class="flex items-center gap-3 flex-shrink-0">
                    <span class="btn-label text-[13px] font-bold uppercase tracking-[1.5px] text-white">Inquire Now</span>
                    <span class="w-10 h-10 bg-tp-red flex items-center justify-center flex-shrink-0">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                    </span>
                </div>
            </div>
        </button>

        {{-- Collapsible form body --}}
        <div id="svc-inquiry-form-wrap" class="svc-inquiry-wrap bg-black border-b border-[#1e1e1e]">
            <div class="max-w-[1300px] mx-auto px-5">
                <form action="{{ route('inquiry-form') }}" method="POST" class="py-12">
                    @csrf
                    <input type="hidden" name="url" value="{{ url()->current() }}">

                    <div class="inquiry-grid grid grid-cols-2 gap-x-[60px]">
                        <div class="field-diag field-diag-dark relative">
                            <input type="text" name="name" required placeholder="Your Name"
                                class="w-full bg-transparent text-white text-[14px] py-4 px-1 outline-none transition-colors duration-200 box-border"
                                style="border:none;border-bottom:1px solid #444;"
                                onfocus="this.style.borderBottomColor='#E50914'" onblur="this.style.borderBottomColor='#444'">
                        </div>
                        <div class="field-diag field-diag-dark relative">
                            <input type="email" name="email" required placeholder="Email Address"
                                class="w-full bg-transparent text-white text-[14px] py-4 px-1 outline-none transition-colors duration-200 box-border"
                                style="border:none;border-bottom:1px solid #444;"
                                onfocus="this.style.borderBottomColor='#E50914'" onblur="this.style.borderBottomColor='#444'">
                        </div>
                        <div class="field-diag field-diag-dark relative">
                            <input type="tel" name="mobile" required placeholder="Contact Number"
                                class="w-full bg-transparent text-white text-[14px] py-4 px-1 outline-none transition-colors duration-200 box-border"
                                style="border:none;border-bottom:1px solid #444;"
                                onfocus="this.style.borderBottomColor='#E50914'" onblur="this.style.borderBottomColor='#444'">
                        </div>
                        <div class="field-diag field-diag-dark relative">
                            <input type="text" name="country" placeholder="Country"
                                class="w-full bg-transparent text-white text-[14px] py-4 px-1 outline-none transition-colors duration-200 box-border"
                                style="border:none;border-bottom:1px solid #444;"
                                onfocus="this.style.borderBottomColor='#E50914'" onblur="this.style.borderBottomColor='#444'">
                        </div>
                    </div>

                    <div class="flex items-end gap-4 flex-wrap mt-0">
                        <div class="field-diag field-diag-dark relative flex-1 min-w-[200px]">
                            <input type="text" name="requirement" required placeholder="What do you need?"
                                class="w-full bg-transparent text-white text-[14px] py-4 px-1 outline-none transition-colors duration-200 box-border"
                                style="border:none;border-bottom:1px solid #444;"
                                onfocus="this.style.borderBottomColor='#E50914'" onblur="this.style.borderBottomColor='#444'">
                        </div>
                        <button type="submit"
                            class="bg-tp-red hover:bg-[#c0070f] text-white border-0 py-4 px-9 text-[12px] font-bold uppercase tracking-[1.5px] cursor-pointer whitespace-nowrap flex-shrink-0 transition-colors duration-200 mb-px">
                            Send Enquiry
                        </button>
                    </div>

                    <p class="text-[12px] text-[#444] mt-5">We'll respond within 24 hours. No spam, ever.</p>
                </form>
            </div>
        </div>

    </section>
    {{-- ====================== End CTA + Inquiry Form ====================== --}}

    {{-- ====================== CLIENTS ====================== --}}
    <section class="bg-white py-20">
        <div class="mx-auto max-w-[1140px] px-5">
            <div class="mb-[60px] text-center">
                <h2 class="m-0 text-[56px] font-extrabold text-black max-[575px]:text-[32px]">
                    Brands We've <span class="text-film-red">Built For</span>
                </h2>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach(range(1, 20) as $i)
                <div class="group flex min-h-[120px] items-center justify-center p-5 transition-transform duration-300 hover:scale-110">
                    <img src="{{ asset('assets/img/clients/' . $i . '.png') }}"
                         alt="Client Logo"
                         loading="lazy"
                         class="h-auto max-w-full opacity-60 grayscale transition-all duration-300 group-hover:opacity-100 group-hover:grayscale-0">
                </div>
                @endforeach
            </div>

            <div class="mt-6 text-center max-[575px]:mt-10">
                <a href="{{ route('work') }}"
                   class="inline-block rounded border-2 border-solid border-black px-10 py-[14px] text-[14px] font-bold uppercase tracking-[1px] text-black no-underline transition-all duration-300 hover:border-film-red hover:bg-film-red hover:text-white">
                    View Our Work
                </a>
            </div>
        </div>
    </section>

    {{-- ====================== QUOTE ====================== --}}
    <section class="relative bg-black py-[100px]">
        <div class="mx-auto max-w-[1140px] px-5">
            {{-- The oversized decorative quote mark is a ::before in CSS terms; here it
                 is a real element so it stays pure Tailwind. aria-hidden as it is decor. --}}
            <div class="relative mx-auto max-w-[900px] text-center">
                <span aria-hidden="true"
                      class="pointer-events-none absolute left-1/2 top-[-80px] z-0 -translate-x-1/2 font-serif text-[200px] leading-none text-film-red/50 max-[575px]:top-[-60px] max-[575px]:text-[150px]">"</span>
                <p class="relative z-[1] m-0 text-[32px] font-medium leading-[1.6] text-white max-[575px]:text-[22px]">
                    A brand is the set of expectations, memories,<br>
                    stories and relationships that account for a consumer's decision.
                </p>
            </div>
        </div>
    </section>

    {{-- ====================== FAQ ====================== --}}
    {{--
        <details>/<summary> rather than a JS accordion: the answers stay in the DOM
        and remain crawlable whether or not the panel is open, and it works with
        no script at all. $brandingFaqs is defined in @section('head') so the same
        array feeds the FAQPage schema -- copy and markup cannot drift apart.
    --}}
    <section class="bg-white py-20" id="branding-faq">
        <div class="mx-auto max-w-[900px] px-5">
            <div class="mb-12 text-center">
                <p class="m-0 mb-3 text-[11px] font-bold uppercase tracking-[3px] text-film-red">Common Questions</p>
                <h2 class="m-0 text-[42px] font-bold leading-[1.15] text-black max-[575px]:text-[30px]">
                    Branding FAQs
                </h2>
            </div>

            @foreach($brandingFaqs as $faq)
            <details class="group border-0 border-b border-solid border-[#e8e8e8]">
                <summary class="flex cursor-pointer list-none items-center justify-between gap-4 py-6 [&::-webkit-details-marker]:hidden">
                    <h3 class="m-0 text-[17px] font-bold leading-snug text-black max-[575px]:text-[15px]">{{ $faq['q'] }}</h3>
                    <span aria-hidden="true"
                          class="shrink-0 text-[24px] font-bold leading-none text-film-red transition-transform duration-300 group-open:rotate-45">+</span>
                </summary>
                <p class="m-0 pb-6 text-[15px] leading-[1.8] text-[#666]">{{ $faq['a'] }}</p>
            </details>
            @endforeach
        </div>
    </section>

    {{-- ====================== CTA ====================== --}}
    <section class="bg-white pt-[100px]">
        <div class="mx-auto max-w-[1140px] px-5">
            <div class="mb-10 text-center">
                <h4 class="m-0 mb-[10px] text-[38px] font-normal text-[#666] max-[575px]:text-[26px]">Think. Create. Launch.</h4>
                <h2 class="m-0 text-[42px] font-bold text-black max-[575px]:text-[32px]">Branding That Works as Hard as You Do</h2>
            </div>
            <p class="mx-auto m-0 max-w-[900px] text-center text-[18px] leading-[1.8] text-[#666]">
                We treat every branding project as if we were building our own brand from scratch.
                That means deep research, honest strategy, and design that doesn't just look good on a slide
                it holds up in the real world, at every scale, in every context.
            </p>
        </div>
    </section>

    {{-- ====================== BOTTOM ====================== --}}
    <section class="bg-white py-[100px]">
        <div class="mx-auto max-w-[1140px] px-5">
            <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-12">
                <div class="lg:col-span-5">
                    <img src="{{ asset('assets/img/home/home-04.png') }}"
                         alt="Brand Story"
                         loading="lazy"
                         class="h-auto max-w-full">
                </div>

                <div class="lg:col-span-7">
                    <div class="mb-6">
                        <p class="m-0 mb-[10px] text-[56px] font-light text-black max-[575px]:text-[38px]">Brand</p>
                        <b class="text-[66px] font-extrabold text-black max-[575px]:block max-[575px]:text-[42px]">
                            Your St<img src="{{ asset('assets/img/shape-03.png') }}"
                                        alt=""
                                        aria-hidden="true"
                                        class="inline-block w-[78px] -mt-20 -mb-8 -ml-[10px] -mr-4 max-[575px]:mx-0 max-[575px]:mt-0 max-[575px]:mb-0 max-[575px]:w-10 max-[575px]:align-middle">ry
                        </b>
                    </div>

                    <div class="mb-5 text-[18px] leading-[1.8] text-neutral-600">
                        <p class="m-0 mb-5">
                            We are creatively strategic and strategically creative. We follow a research-based
                            strategy to create memorable brand identities.
                        </p>
                        <p class="m-0">
                            Advertising is the aftertaste of a good story. So, Thumbpin weaves a unique tale for
                            your brand punched together with design and production.
                        </p>
                    </div>

                    <a href="{{ route('contact') }}"
                       class="inline-block rounded bg-film-red px-10 py-[15px] font-semibold text-white no-underline transition-all duration-300 hover:-translate-y-[2px] hover:bg-[#c91820]">
                        Get In Touch
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
