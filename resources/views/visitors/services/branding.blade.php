@extends('layout.visitor', [
    'title' => 'Best Branding Agency in Gurgaon | Brand Identity & Strategy',
    'description' => 'Thumbpin is a top branding agency in Gurgaon. We craft compelling brand identities, logos, brand guidelines, and brand strategies that make your business unforgettable.',
    'keywords' => 'branding agency gurgaon, brand identity design, logo design agency, brand strategy, brand guidelines, brand naming, creative branding agency india',
    'image' => config('app.url') . '/img/og/branding.png',
    'image_alt' => 'Thumbpin branding agency — brand identity and strategy in Gurgaon',
    'footer_black' => 'footer-black',
])

@section('head')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
<noscript>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</noscript>
<link rel="stylesheet" href="@asset('css/app.css')">

{{-- Rules Tailwind has no utility for: -webkit-text-stroke, ::placeholder,
     details-content animation, and the reduced-motion opt-out. --}}
<style>
.hero-title-outline { color: transparent; -webkit-text-stroke: 2px rgba(255,255,255,0.6); }
@media (max-width: 767px) { .hero-title-outline { -webkit-text-stroke-width: 1px; } }

/* Inquiry form. Unlike visitors/services.blade.php this one is always expanded,
   so the accordion rules (.svc-inquiry-wrap / .is-open) are deliberately absent
   -- their max-height:800px + overflow:hidden would also have clipped the form
   on mobile, where the grid stacks to a single column and grows past 800px. */
::placeholder { color: #7a7a7a; }   /* #444 on black was ~2.3:1 -- unreadable */
@media (max-width: 768px) {
    .inquiry-grid { grid-template-columns: 1fr !important; }
}

/* Inputs. Replaces the inline onfocus/onblur handlers the other service pages
   use -- those only ran on real focus events and left keyboard users with no
   ring at all, since the class list also sets outline-none. */
.inq-input {
    border: 0;
    border-bottom: 1px solid #3d3d3d;
    transition: border-color 200ms ease, background-color 200ms ease;
}
.inq-input:hover { border-bottom-color: #5c5c5c; }
.inq-input:focus {
    border-bottom-color: #E50914;
    background-color: rgba(255,255,255,0.03);
}
.inq-input:focus-visible {
    outline: 2px solid #E50914;
    outline-offset: 3px;
}
/* The browser's own validation state, once the field has been interacted with. */
.inq-input:not(:placeholder-shown):invalid { border-bottom-color: #E50914; }

/* The hero reveal, the FAQ chevron and every hover transform are decoration.
   Users who ask the OS to stop motion get the end state immediately. */
@media (prefers-reduced-motion: reduce) {
    *, *::before, *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
        scroll-behavior: auto !important;
    }
    .animate-hero-reveal { opacity: 1 !important; transform: none !important; }
}

/* FAQ answers slide rather than snap where the browser supports it.
   Progressive enhancement -- unsupported browsers just get the instant open. */
@supports (interpolate-size: allow-keywords) {
    .faq-item { interpolate-size: allow-keywords; }
    .faq-item::details-content {
        block-size: 0;
        overflow: hidden;
        transition: block-size 300ms ease, content-visibility 300ms allow-discrete;
    }
    .faq-item[open]::details-content { block-size: auto; }
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
        <div class="absolute inset-0 z-[2] bg-black/75"></div>
        <div class="absolute inset-0 z-[2]" style="background:radial-gradient(ellipse at center,transparent 30%,#000 85%);"></div>
        {{-- Brand-red bloom behind the wordmark. Keeps the hero from reading as a
             generic grey photo wash and ties it to the accent used page-wide. --}}
        <div aria-hidden="true" class="pointer-events-none absolute inset-0 z-[2]"
             style="background:radial-gradient(ellipse 55% 45% at 50% 42%,rgba(229,9,20,0.20),transparent 70%);"></div>

        <div class="relative z-[3] mx-auto max-w-[900px] text-center">
            <p class="m-0 mb-6 text-[10px] font-bold uppercase tracking-[4px] text-film-red opacity-0 animate-hero-reveal [animation-delay:150ms] max-[575px]:tracking-[3px]">
                Branding &amp; Identity
            </p>

            <h1 class="m-0 mb-6 text-[clamp(44px,9vw,110px)] font-extrabold uppercase leading-[0.92] tracking-[-2px] text-white opacity-0 translate-y-[30px] animate-hero-reveal [animation-delay:300ms]">
                Branding <span class="hero-title-outline">Agency</span>
            </h1>

            <p class="mx-auto mb-12 max-w-[600px] text-[18px] font-light leading-[1.7] text-[#a8a8a8] opacity-0 animate-hero-reveal [animation-delay:600ms] max-[575px]:mb-10 max-[575px]:text-[16px]">
                We build brands that mean something. From logo to language, identity to strategy every element crafted with intention and precision.
            </p>

            {{--
                A 3-up grid rather than a wrapping flex row: at ~360px the old
                flex line broke to 2 + 1 and left the third stat stranded and
                off-centre. The grid keeps all three on one line at every width,
                with hairline rules doing the separating that the wide gap used
                to do.
            --}}
            <div class="mx-auto grid max-w-[560px] grid-cols-3 opacity-0 animate-hero-reveal [animation-delay:900ms]">
                @foreach([['50+','Brand Identities'],['20+','Industries Served'],['6+','Years Experience']] as $i => [$num, $label])
                <div class="px-2 text-center {{ $i > 0 ? 'border-l border-solid border-white/15' : '' }}">
                    <div class="text-[42px] font-black leading-none text-film-red max-[767px]:text-[30px]">{{ $num }}</div>
                    <div class="mt-2 text-[11px] uppercase leading-[1.4] tracking-[2px] text-[#8a8a8a] max-[575px]:text-[9px] max-[575px]:tracking-[1px]">{{ $label }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Visible breadcrumb, mirroring the BreadcrumbList schema in @section('head'). --}}
    @include('inc.breadcrumb', ['trail' => [
        ['Home',     route('home')],
        ['Services', route('services')],
        ['Branding', null],
    ]])

    {{-- ====================== INTRO ====================== --}}
    <section class="bg-white pt-14 pb-[60px] max-[575px]:pt-10">
        <div class="mx-auto max-w-[1140px] px-5">
            <p class="m-0 mb-4 text-center text-[11px] font-bold uppercase tracking-[3px] text-film-red">The Approach</p>
            <h2 class="mx-auto m-0 mb-[30px] max-w-[16ch] text-center text-[42px] font-bold leading-[1.15] tracking-[-1px] text-black max-[575px]:text-[30px]">
                Building Brands That People Remember
            </h2>
            <p class="mx-auto m-0 max-w-[72ch] text-center text-[18px] leading-[1.8] text-[#555] max-[575px]:text-[16px] max-[575px]:leading-[1.75]">
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
                    'icon'  => 'identity',
                    'title' => 'Brand Identity Design',
                    'lead'  => "Your visual identity is the first impression your brand makes, and usually the only one you get. We design logos, colour systems, typography hierarchies, and visual languages that feel distinct, consistent, and unmistakably yours across every medium.",
                    'body'  => "A logo on its own is not an identity. We build the entire system around it — how it behaves at 16 pixels on a favicon and at six feet on a hoarding, which colours carry which meaning, how photography is treated, and what the brand looks like when it has to sit beside a competitor. The result is a toolkit your team can actually use without calling a designer every time.",
                    'items' => ['Logo design & lockups', 'Colour palette systems', 'Typography hierarchy', 'Iconography & visual motifs', 'Photography & art direction', 'Stationery & collateral'],
                ],
                [
                    'icon'  => 'strategy',
                    'title' => 'Brand Strategy',
                    'lead'  => "Before design comes direction. We define your brand's positioning, purpose, voice, and values, giving every future decision a foundation to stand on rather than a mood board to guess from.",
                    'body'  => "Our strategy work starts with research: stakeholder interviews, competitor mapping, and audience study. From there we articulate what your brand stands for, who it is genuinely for, and how it should sound. That document becomes the reference every marketing decision is measured against — so your campaigns stop contradicting each other.",
                    'items' => ['Market & competitor research', 'Brand positioning', 'Audience & persona mapping', 'Brand purpose & values', 'Tone of voice framework', 'Messaging architecture'],
                ],
                [
                    'icon'  => 'guidelines',
                    'title' => 'Brand Guidelines',
                    'lead'  => "Consistency is what turns a brand into a legacy. We create comprehensive brand guidelines documenting how your brand looks, sounds, and behaves, so every team, vendor, and platform stays aligned.",
                    'body'  => "Most brands do not fail from bad design; they fail from inconsistent application. A guidelines document removes the ambiguity — clear spacing rules, approved and unapproved usage, file formats, digital and print specifications, and writing standards. Hand it to a new agency, a printer, or an intern and the brand still comes out right.",
                    'items' => ['Logo usage rules', 'Clear space & minimum sizes', 'Colour codes (CMYK, RGB, HEX, Pantone)', 'Typography specifications', 'Do & do-not examples', 'Digital and print applications'],
                ],
                [
                    'icon'  => 'naming',
                    'title' => 'Brand Naming',
                    'lead'  => "The right name carries your brand further than any advertisement ever could. We develop names that are memorable, meaningful, and built for longevity.",
                    'body'  => "Naming is equal parts creative and practical. We generate territories, pressure-test shortlists for pronunciation and unintended meanings, and check trademark and domain viability before you commit. A name that cannot be registered, spelled, or said aloud on a phone call is not a name — it is a liability.",
                    'items' => ['Naming territories & routes', 'Linguistic screening', 'Trademark viability checks', 'Domain & handle availability', 'Tagline development', 'Naming rationale document'],
                ],
                [
                    'icon'  => 'rebrand',
                    'title' => 'Rebranding & Brand Refresh',
                    'lead'  => "Brands age. Markets shift. Audiences move on. A considered rebrand realigns your identity with where the business is going, without discarding the equity you have already earned.",
                    'body'  => "We begin with a brand audit to establish what is worth keeping — recognition, colour equity, customer associations — and what is holding you back. Some businesses need a full rebuild; many need a disciplined refresh. We will tell you honestly which one you are, and stage the rollout so nothing breaks mid-transition.",
                    'items' => ['Brand audit & diagnosis', 'Equity assessment', 'Identity evolution', 'Migration & rollout planning', 'Internal launch support', 'Legacy asset transition'],
                ],
            ];

            /*
             * Line marks for the left rail, one per service. Drawn rather than
             * pulled from an icon set so each one says something specific about
             * its service instead of being a generic glyph.
             *
             * Shared spec, so the five read as a family:
             *   - 56x56 viewBox, 2px strokes, round caps and joins
             *   - structural strokes use currentColor, so the wrapper's text
             *     colour drives them and the whole mark can transition to red
             *     on hover with no per-path rules
             *   - exactly one film-red accent each, marking the "point" of the
             *     idea: the mark being made, the bullseye, the rule that is
             *     enforced, the name itself, the equity kept through a rebrand
             */
            $brandingIcons = [

                // Artboard holding a mark, palette swatches below. Artboard and
                // swatch row share the same left and right edges (3 and 47) so
                // the whole thing sits on one optical column.
                'identity' => <<<'SVG'
                    <rect x="3" y="3" width="44" height="30" rx="3" stroke="currentColor" stroke-width="2"/>
                    <circle cx="17" cy="18" r="7.5" stroke="#E50914" stroke-width="2"/>
                    <rect x="28" y="11" width="14" height="14" rx="2" stroke="currentColor" stroke-width="2"/>
                    <rect x="3" y="41" width="12" height="9" rx="2" fill="#E50914"/>
                    <rect x="19" y="41" width="12" height="9" rx="2" stroke="currentColor" stroke-width="2"/>
                    <rect x="35" y="41" width="12" height="9" rx="2" stroke="currentColor" stroke-width="2"/>
                SVG,

                // Bullseye with an arrow already in the centre: direction, then design.
                'strategy' => <<<'SVG'
                    <circle cx="24" cy="32" r="19" stroke="currentColor" stroke-width="2"/>
                    <circle cx="24" cy="32" r="10" stroke="currentColor" stroke-width="2"/>
                    <circle cx="24" cy="32" r="3.5" fill="#E50914"/>
                    <path d="M24 32 51 5" stroke="#E50914" stroke-width="2" stroke-linecap="round"/>
                    <path d="M41 5h10v10" stroke="#E50914" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                SVG,

                // A spec sheet: folded page, rule lines, one of them the enforced rule.
                'guidelines' => <<<'SVG'
                    <path d="M10 3h20l16 16v34H10z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                    <path d="M30 3v16h16" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                    <path d="M18 30h20" stroke="#E50914" stroke-width="2" stroke-linecap="round"/>
                    <path d="M18 38h20M18 46h12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                SVG,

                // The name said aloud: a bubble with the word set inside it. The
                // earlier tag shape was ruled out -- axis-aligned it came out
                // twice as wide as it was tall and broke the set's optical weight.
                'naming' => <<<'SVG'
                    <path d="M10 5h36a5 5 0 0 1 5 5v24a5 5 0 0 1-5 5H24L13 50V39h-3a5 5 0 0 1-5-5V10a5 5 0 0 1 5-5z"
                          stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                    <path d="M15 18h26" stroke="#E50914" stroke-width="2" stroke-linecap="round"/>
                    <path d="M15 27h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                SVG,

                // Refresh cycle turning around a mark that is kept, not discarded.
                'rebrand' => <<<'SVG'
                    <path d="M50 28a22 22 0 1 1-7.2-16.3" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    <path d="M43 3v10H33" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <circle cx="28" cy="28" r="8" fill="#E50914"/>
                SVG,
            ];
            @endphp

            {{--
                Full-width rows rather than a card grid: five items in two columns
                leaves an orphan, and the deliverables list needs horizontal room
                that a half-width card cannot give it. Title sticks to the left
                rail on desktop while the copy scrolls past it.
            --}}
            <div class="mb-12 text-center max-[575px]:mb-9">
                <p class="m-0 mb-3 text-[11px] font-bold uppercase tracking-[3px] text-film-red">What We Do</p>
                <h2 class="m-0 text-[42px] font-bold leading-[1.15] tracking-[-1px] text-black max-[575px]:text-[30px]">
                    Five Ways We Build a Brand
                </h2>
            </div>

            <div class="border-t border-solid border-[#e8e8e8]">
                @foreach($services as $i => $service)
                <article class="group grid grid-cols-1 gap-x-16 gap-y-6 border-b border-solid border-[#e8e8e8] py-14 transition-colors duration-300 lg:grid-cols-12 max-[767px]:gap-y-4 max-[767px]:py-10">

                    {{-- Left rail: number + title --}}
                    <div class="lg:col-span-4">
                        <div class="lg:sticky lg:top-32">
                            <span class="mb-3 block font-mono text-[12px] font-bold tracking-[1px] text-film-red max-[767px]:mb-2">
                                {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>
                            <h3 class="m-0 text-[30px] font-extrabold leading-[1.15] tracking-[-0.5px] text-black transition-colors duration-300 group-hover:text-film-red max-[991px]:text-[26px] max-[575px]:text-[23px]">
                                {{ $service['title'] }}
                            </h3>
                            {{--
                                Desktop only. The rail is sticky, so this mark is
                                what stays on screen while the copy scrolls past --
                                it earns its space there in a way it would not in
                                the mobile stack, where the title already sits
                                directly above its own paragraph.

                                aria-hidden: the <h3> beside it already names the
                                service, so announcing the mark would only repeat
                                what was just read. Structural strokes inherit
                                currentColor, which is what lets the whole mark
                                travel to red on hover alongside the title.
                            --}}
                            <span aria-hidden="true"
                                  class="mt-6 hidden text-[#111] transition-colors duration-300 group-hover:text-film-red lg:block">
                                <svg viewBox="0 0 56 56" width="60" height="60" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round" role="presentation" focusable="false">
                                    {!! $brandingIcons[$service['icon']] !!}
                                </svg>
                            </span>
                        </div>
                    </div>

                    {{-- Right: copy + deliverables --}}
                    <div class="lg:col-span-8">
                        <p class="m-0 mb-5 text-[18px] leading-[1.7] text-[#333] max-[575px]:text-[16px]">
                            {{ $service['lead'] }}
                        </p>
                        <p class="m-0 mb-7 text-[15px] leading-[1.85] text-[#6b6b6b] max-[575px]:mb-6">
                            {{ $service['body'] }}
                        </p>

                        {{--
                            The deliverables list. $services has carried an 'items'
                            key from the start but nothing rendered it, so six
                            concrete, highly searchable phrases per service were
                            being thrown away. Two columns on desktop, one on
                            mobile where a 2-col list would wrap every label.
                        --}}
                        <ul class="m-0 grid list-none grid-cols-2 gap-x-8 gap-y-[10px] p-0 max-[575px]:grid-cols-1 max-[575px]:gap-y-2">
                            @foreach($service['items'] as $item)
                            <li class="flex items-start gap-[10px] text-[14px] leading-[1.5] text-[#444]">
                                <span aria-hidden="true" class="mt-[7px] h-[5px] w-[5px] shrink-0 rounded-full bg-film-red"></span>
                                {{ $item }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ====================== CTA + Inquiry Form ====================== --}}
    <section id="cta-inquiry" class="bg-black">

        {{-- Top strip: centered heading --}}
        <div class="text-center px-5 pt-[72px] pb-[20px] max-[575px]:pt-14">
            {{-- Was 18px, the same size as the body line below it, which made the
                 eyebrow compete with the heading instead of introducing it. --}}
            <p class="text-[11px] tracking-[3px] text-tp-red uppercase font-bold mb-[14px]">Work With Us</p>
            <h2 class="text-[clamp(32px,5vw,60px)] font-black uppercase leading-[1.05] text-white mb-[18px] tracking-[-1.5px]">Ready to Get Started?</h2>
            <p class="text-[16px] text-[#999] max-w-[480px] mx-auto leading-[1.65]">Tell us about your project we'll get back within 24 hours.</p>
        </div>

        {{-- Section header. A plain div, not a button: the form below is always
             expanded, so a control that toggles nothing would mislead both users
             and screen readers. The chevron and "Inquire Now" label went with it. --}}
        <div class="w-full bg-black border-t border-b border-[#1e1e1e] flex items-center justify-between">
            <div class="max-w-[1300px] mx-auto px-5 py-7 flex items-center justify-between w-full gap-6 flex-wrap">
                <div class="text-left">
                    <p class="text-[11px] tracking-[3px] text-tp-red uppercase font-bold mb-[6px]">Start Here</p>
                    <span class="text-[clamp(18px,2.5vw,26px)] font-extrabold text-white uppercase tracking-[-0.5px] block">Let's Get You Onboarded</span>
                </div>
            </div>
        </div>

        {{-- Form body -- always visible --}}
        <div id="svc-inquiry-form-wrap" class="bg-black border-b border-[#1e1e1e]">
            <div class="max-w-[1300px] mx-auto px-5">
                {{-- Tighter top padding on phones: py-12 under the "Start Here"
                     strip left a visibly empty band before the first field. --}}
                <form action="{{ route('inquiry-form') }}" method="POST" class="py-12 max-[575px]:pt-6 max-[575px]:pb-10">
                    @csrf
                    <input type="hidden" name="url" value="{{ url()->current() }}">

                    {{--
                        gap-y matters as much as gap-x here: below 768px the grid
                        collapses to one column, and with only gap-x set the five
                        fields ran together as one undifferentiated stack of rules.
                        Labels are visually hidden rather than absent -- the
                        placeholder disappears the moment you type, which leaves a
                        screen reader with nothing to announce on review.
                    --}}
                    <div class="inquiry-grid grid grid-cols-2 gap-x-[60px] gap-y-2 max-[768px]:gap-y-3">
                        @foreach([
                            ['name',    'text',  'Your Name',      true],
                            ['email',   'email', 'Email Address',  true],
                            ['mobile',  'tel',   'Contact Number', true],
                            ['country', 'text',  'Country',        false],
                        ] as [$field, $type, $label, $required])
                        <div class="field-diag field-diag-dark relative">
                            <label for="inq-{{ $field }}" class="sr-only">{{ $label }}</label>
                            <input id="inq-{{ $field }}" type="{{ $type }}" name="{{ $field }}" {{ $required ? 'required' : '' }}
                                @if($field === 'name') autocomplete="name"
                                @elseif($field === 'email') autocomplete="email"
                                @elseif($field === 'mobile') autocomplete="tel"
                                @else autocomplete="country-name" @endif
                                placeholder="{{ $label }}{{ $required ? '' : ' (optional)' }}"
                                class="inq-input w-full bg-transparent text-white text-[14px] py-4 px-1 box-border">
                        </div>
                        @endforeach
                    </div>

                    {{-- items-stretch + the mobile full-width button: at 375px the
                         old whitespace-nowrap button was ~180px wide and sat
                         orphaned on its own line against the left edge. --}}
                    <div class="mt-2 flex flex-wrap items-end gap-4 max-[575px]:mt-3 max-[575px]:gap-5">
                        <div class="field-diag field-diag-dark relative min-w-[200px] flex-1 max-[575px]:w-full max-[575px]:flex-none">
                            <label for="inq-requirement" class="sr-only">What do you need?</label>
                            <input id="inq-requirement" type="text" name="requirement" required placeholder="What do you need?"
                                class="inq-input w-full bg-transparent text-white text-[14px] py-4 px-1 box-border">
                        </div>
                        <button type="submit"
                            class="mb-px flex-shrink-0 cursor-pointer whitespace-nowrap border-0 bg-tp-red px-9 py-4 text-[12px] font-bold uppercase tracking-[1.5px] text-white transition-all duration-200 hover:bg-[#e03840] hover:-translate-y-px focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[3px] focus-visible:outline-white active:translate-y-0 max-[575px]:w-full max-[575px]:py-[18px]">
                            Send Enquiry
                        </button>
                    </div>

                    {{-- #444 on black is ~2.3:1. #8a8a8a clears 4.5:1 at this size. --}}
                    <p class="text-[12px] text-[#8a8a8a] mt-6">We'll respond within 24 hours. No spam, ever.</p>
                </form>
            </div>
        </div>

    </section>
    {{-- ====================== End CTA + Inquiry Form ====================== --}}

    {{-- ====================== CLIENTS ====================== --}}
    <section class="bg-white py-20 max-[575px]:py-14">
        <div class="mx-auto max-w-[1140px] px-5">
            {{-- Was 56px -- larger than every other h2 on the page, which made the
                 logo wall read as the main event. Matched to the 42px section scale. --}}
            <div class="mb-12 text-center max-[575px]:mb-9">
                <p class="m-0 mb-3 text-[11px] font-bold uppercase tracking-[3px] text-film-red">Selected Clients</p>
                {{-- text-wrap:balance stops the mobile break leaving "For" alone
                     on its own line under the rest of the heading. --}}
                <h2 class="mx-auto m-0 max-w-[14ch] text-[42px] font-bold leading-[1.15] tracking-[-1px] text-black [text-wrap:balance] max-[575px]:text-[30px]">
                    Brands We've <span class="text-film-red">Built For</span>
                </h2>
            </div>

            {{--
                Hairline cell borders turn 20 loose logos into a deliberate grid.
                Negative margin + per-cell top/left borders is the standard trick
                for avoiding doubled lines without :nth-child maths that would
                have to change at every breakpoint.
            --}}
            {{-- border-r/-b on the container closes the right and bottom edges that
                 per-cell top/left rules leave open. 20 logos divides evenly by 2,
                 4 and 5, so no breakpoint ends on a short row. --}}
            <div class="-mt-px -ml-px grid grid-cols-2 border-b border-r border-solid border-[#eee] md:grid-cols-4 lg:grid-cols-5">
                @foreach(range(1, 20) as $i)
                <div class="group flex min-h-[120px] items-center justify-center border-t border-l border-solid border-[#eee] p-6 transition-colors duration-300 hover:bg-[#fafafa] max-[575px]:min-h-[96px] max-[575px]:p-4">
                    <img src="{{ asset('assets/img/clients/' . $i . '.png') }}"
                         alt="Client Logo"
                         loading="lazy"
                         class="h-auto max-w-full opacity-50 grayscale transition-all duration-300 group-hover:scale-105 group-hover:opacity-100 group-hover:grayscale-0">
                </div>
                @endforeach
            </div>

            <div class="mt-12 text-center max-[575px]:mt-10">
                <a href="{{ route('work') }}"
                   class="inline-block rounded border-2 border-solid border-black px-10 py-[14px] text-[14px] font-bold uppercase tracking-[1px] text-black no-underline transition-all duration-300 hover:border-film-red hover:bg-film-red hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[3px] focus-visible:outline-film-red max-[575px]:block max-[575px]:px-6">
                    View Our Work
                </a>
            </div>
        </div>
    </section>

    {{-- ====================== QUOTE ====================== --}}
    <section class="relative overflow-hidden bg-black py-[120px] max-[575px]:py-20">
        {{-- Same red bloom as the hero, at a lower intensity. Two black sections
             separated by white now echo each other instead of reading as two
             unrelated dark bands. --}}
        <div aria-hidden="true" class="pointer-events-none absolute inset-0"
             style="background:radial-gradient(ellipse 60% 60% at 50% 50%,rgba(229,9,20,0.12),transparent 70%);"></div>

        <div class="relative mx-auto max-w-[1140px] px-5">
            {{-- The oversized decorative quote mark is a ::before in CSS terms; here it
                 is a real element so it stays pure Tailwind. aria-hidden as it is decor. --}}
            <figure class="relative mx-auto m-0 max-w-[900px] text-center">
                <span aria-hidden="true"
                      class="pointer-events-none absolute left-1/2 top-[-70px] z-0 -translate-x-1/2 font-serif text-[200px] leading-none text-film-red/40 max-[575px]:top-[-46px] max-[575px]:text-[130px]">&ldquo;</span>
                {{--
                    The hard <br> was breaking mid-clause on every phone. A
                    balanced wrap with a ~34ch measure lets the browser choose the
                    break at each width instead.
                --}}
                <blockquote class="relative z-[1] m-0 text-[32px] font-medium leading-[1.5] tracking-[-0.5px] text-white [text-wrap:balance] max-[767px]:text-[26px] max-[575px]:text-[21px] max-[575px]:leading-[1.55]">
                    A brand is the set of expectations, memories, stories and relationships
                    that account for a consumer's decision.
                </blockquote>
                <figcaption class="relative z-[1] mt-8 text-[11px] font-bold uppercase tracking-[3px] text-film-red max-[575px]:mt-6">
                    Seth Godin
                </figcaption>
            </figure>
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
            {{-- border-t on the first item only closes the top of the stack, so the
                 list reads as one bounded block rather than trailing off upward. --}}
            <details class="faq-item group border-b border-solid border-[#e8e8e8] {{ $loop->first ? 'border-t' : '' }}">
                {{-- min-h-[56px] keeps the row above the 44px touch target floor even
                     with a one-line question. focus-visible is on the summary itself,
                     since that is the element the keyboard actually lands on. --}}
                <summary class="flex min-h-[56px] cursor-pointer list-none items-center justify-between gap-4 py-6 transition-colors duration-200 hover:text-film-red focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-film-red [&::-webkit-details-marker]:hidden max-[575px]:py-5">
                    <h3 class="m-0 text-[17px] font-bold leading-snug text-black transition-colors duration-200 group-hover:text-film-red group-open:text-film-red max-[575px]:text-[15px]">{{ $faq['q'] }}</h3>
                    <span aria-hidden="true"
                          class="grid h-7 w-7 shrink-0 place-items-center rounded-full text-[22px] font-bold leading-none text-film-red transition-all duration-300 group-hover:bg-film-red/10 group-open:rotate-45">+</span>
                </summary>
                <p class="m-0 pb-7 pr-10 text-[15px] leading-[1.8] text-[#666] max-[575px]:pr-0 max-[575px]:pb-6">{{ $faq['a'] }}</p>
            </details>
            @endforeach
        </div>
    </section>

    {{-- ====================== CTA ====================== --}}
    <section class="bg-white pt-[100px] max-[575px]:pt-16">
        <div class="mx-auto max-w-[1140px] px-5">
            <div class="mb-8 text-center">
                <h4 class="m-0 mb-3 text-[38px] font-light tracking-[-0.5px] text-[#999] max-[575px]:text-[24px]">Think. Create. Launch.</h4>
                <h2 class="mx-auto m-0 max-w-[20ch] text-[42px] font-bold leading-[1.15] tracking-[-1px] text-black max-[575px]:text-[30px]">Branding That Works as Hard as You Do</h2>
            </div>
            <p class="mx-auto m-0 max-w-[72ch] text-center text-[18px] leading-[1.8] text-[#555] max-[575px]:text-[16px]">
                We treat every branding project as if we were building our own brand from scratch.
                That means deep research, honest strategy, and design that doesn't just look good on a slide
                it holds up in the real world, at every scale, in every context.
            </p>
        </div>
    </section>

    {{-- ====================== BOTTOM ====================== --}}
    <section class="bg-white pt-16 pb-[100px] max-[575px]:pt-12 max-[575px]:pb-16">
        <div class="mx-auto max-w-[1140px] px-5">
            <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-12 max-[767px]:gap-8">
                {{-- Hidden on phones: it is decorative, and at 575px and below it
                     pushed the headline and copy off the first screen for no
                     informational gain. Tablet and up still get it. --}}
                <div class="lg:col-span-5 max-[575px]:hidden">
                    <img src="{{ asset('assets/img/home/home-04.png') }}"
                         alt=""
                         aria-hidden="true"
                         loading="lazy"
                         class="mx-auto h-auto max-w-full max-[1023px]:max-w-[360px]">
                </div>

                <div class="lg:col-span-7">
                    {{-- Left exactly as it was. The negative-margin positioning of
                         the shape is hand-tuned and does not survive being made
                         "systematic" -- do not refactor it. --}}
                    <div class="mb-6">
                        <p class="m-0 mb-[10px] text-[56px] font-light text-black max-[575px]:text-[38px]">Brand</p>
                        <b class="text-[66px] font-extrabold text-black max-[575px]:block max-[575px]:text-[42px]">
                            Your St<img src="{{ asset('assets/img/shape-03.png') }}"
                                        alt=""
                                        aria-hidden="true"
                                        class="inline-block w-[78px] -mt-20 -mb-8 -ml-[10px] -mr-4 max-[575px]:mx-0 max-[575px]:mt-0 max-[575px]:mb-0 max-[575px]:w-10 max-[575px]:align-middle">ry
                        </b>
                    </div>

                    <div class="mb-8 text-[18px] leading-[1.8] text-[#555] max-[575px]:text-[16px]">
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
                       class="inline-block rounded bg-film-red px-10 py-[15px] font-semibold text-white no-underline transition-all duration-300 hover:-translate-y-[2px] hover:bg-[#c91820] hover:shadow-[0_10px_24px_rgba(229,9,20,0.28)] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-[3px] focus-visible:outline-film-red active:translate-y-0 max-[575px]:block max-[575px]:px-6 max-[575px]:py-4 max-[575px]:text-center">
                        Get In Touch
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
