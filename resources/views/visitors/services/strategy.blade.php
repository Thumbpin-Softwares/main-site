@extends('layout.visitor', [
    'title' => 'Marketing Strategy Agency in Gurgaon | Brand & Media Planning',
    'description' => 'Thumbpin builds research-led marketing and brand strategies — positioning, consumer insight, go-to-market planning and media strategy across traditional and digital channels.',
    'keywords' => 'marketing strategy agency gurgaon, brand strategy consultant, go to market strategy, media planning agency, communication strategy, market research agency india, content strategy agency',
    'image' => config('app.url') . '/img/og/strategy.png',
    'image_alt' => 'Thumbpin marketing strategy agency — brand and media planning in Gurgaon',
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
$strategyFaqs = [
    ['q' => 'What does a marketing strategy actually include?',
     'a' => "At minimum: who you are competing against and how, which audience segments are worth pursuing, what you will say to them, and which channels will carry it. We deliver that as a written document with the reasoning attached — positioning, audience definition, messaging framework, channel plan, and the measures you will judge it by. It is meant to be used, not filed."],

    ['q' => 'How is strategy different from just running campaigns?',
     'a' => "Campaigns answer 'what are we posting this month'. Strategy answers 'why this audience, this message, this channel, at this price'. Without it, campaigns drift — each one reasonable in isolation, collectively contradictory. Strategy is what makes twelve months of activity add up to something instead of cancelling itself out."],

    ['q' => 'How long does a strategy engagement take?',
     'a' => "A focused positioning or go-to-market sprint typically runs three to five weeks. A full strategy programme with primary research, segmentation, and a twelve-month channel plan usually takes six to ten weeks. Research depth is the main variable — desk research moves quickly, while primary consumer interviews take longer to schedule than to analyse."],

    ['q' => 'Do you do research, or work from what we already know?',
     'a' => "Both, depending on what exists. We start by auditing what you already have — sales data, past campaign performance, customer feedback. Where there are gaps that matter to the decision, we run primary research: stakeholder interviews, customer conversations, competitor and category analysis. We will not commission research you do not need."],

    ['q' => 'Will you execute the strategy or just hand over a document?',
     'a' => "Either. Many clients take the strategy and run it with an in-house team, and that is a legitimate outcome. Where we do execute, the same team that wrote the strategy briefs the creative and performance work — which removes the usual gap between what was recommended and what actually ships."],

    ['q' => 'How do you measure whether a strategy is working?',
     'a' => "We define the measures as part of the strategy, before anything launches, so success is not decided retroactively. Depending on the objective that might be share of search, cost per qualified lead, brand recall, or contribution margin by channel. We set a review cadence and adjust against the data rather than defending the original plan."],

    ['q' => 'Is strategy worth it for a small business or early-stage startup?',
     'a' => "Often more so, because the cost of pointing a small budget at the wrong audience is proportionally higher. The engagement is scoped smaller — a tighter positioning and channel exercise rather than a full research programme — but the questions it answers are the same ones."],

    ['q' => 'Which locations do you take strategy clients in?',
     'a' => "We work with clients across Gurgaon, Delhi NCR, and the rest of India. Workshops, stakeholder interviews, and presentations run effectively remotely, and we travel for on-site sessions where a project genuinely warrants it."],
];

$strategyUrl = url()->current();
$orgId       = config('app.url') . '/#organization';

$strategySchema = [
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
            '@id'         => $strategyUrl . '/#service',
            'name'        => 'Marketing & Brand Strategy',
            'serviceType' => 'Marketing Strategy',
            'url'         => $strategyUrl,
            'provider'    => ['@id' => $orgId],
            'areaServed'  => ['@type' => 'City', 'name' => 'Gurugram'],
            'description' => 'Research-led brand and marketing strategy — positioning, consumer insight, go-to-market planning, media strategy and content strategy from Thumbpin, serving Gurgaon and Delhi NCR.',
        ],
        [
            '@type'      => 'FAQPage',
            '@id'        => $strategyUrl . '/#faq',
            'mainEntity' => array_map(fn ($faq) => [
                '@type'          => 'Question',
                'name'           => $faq['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
            ], $strategyFaqs),
        ],
        [
            '@type' => 'BreadcrumbList',
            '@id'   => $strategyUrl . '/#breadcrumb',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => config('app.url') . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('services')],
                ['@type' => 'ListItem', 'position' => 3, 'name' => 'Strategy', 'item' => $strategyUrl],
            ],
        ],
    ],
];
@endphp
<script type="application/ld+json">
{!! json_encode($strategySchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
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
             style="background-image:url('{{ asset('img/services/strategy.jpeg') }}');"></div>
        <div class="absolute inset-0 z-[2] bg-black/60"></div>
        <div class="absolute inset-0 z-[2]" style="background:radial-gradient(ellipse at center,transparent 30%,#000 85%);"></div>
        {{-- Brand-red bloom behind the wordmark. Keeps the hero from reading as a
             generic grey photo wash and ties it to the accent used page-wide. --}}
        <div aria-hidden="true" class="pointer-events-none absolute inset-0 z-[2]"
             style="background:radial-gradient(ellipse 55% 45% at 50% 42%,rgba(229,9,20,0.20),transparent 70%);"></div>

        <div class="relative z-[3] mx-auto max-w-[900px] text-center">
            <p class="m-0 mb-6 text-[10px] font-bold uppercase tracking-[4px] text-film-red opacity-0 animate-hero-reveal [animation-delay:150ms] max-[575px]:tracking-[3px]">
                Strategy &amp; Planning
            </p>

            <h1 class="m-0 mb-6 text-[clamp(44px,9vw,110px)] font-extrabold uppercase leading-[0.92] tracking-[-2px] text-white opacity-0 translate-y-[30px] animate-hero-reveal [animation-delay:300ms]">
                Marketing <span class="hero-title-outline">Strategy</span>
            </h1>

            <p class="mx-auto mb-12 max-w-[620px] text-[18px] font-light leading-[1.7] text-[#a8a8a8] opacity-0 animate-hero-reveal [animation-delay:600ms] max-[575px]:mb-10 max-[575px]:text-[16px]">
                Research-led thinking that decides where you play and how you win, before a single rupee goes into media.
            </p>

            {{--
                A 3-up grid rather than a wrapping flex row: at ~360px the old
                flex line broke to 2 + 1 and left the third stat stranded and
                off-centre. The grid keeps all three on one line at every width,
                with hairline rules doing the separating that the wide gap used
                to do.
            --}}
            <div class="mx-auto grid max-w-[560px] grid-cols-3 opacity-0 animate-hero-reveal [animation-delay:900ms]">
                @foreach([['35+','Strategy Projects'],['12+','Categories Mapped'],['6+','Years Experience']] as $i => [$num, $label])
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
        ['Strategy', null],
    ]])

    {{-- ====================== INTRO ====================== --}}
    <section class="bg-white pt-14 pb-[60px] max-[575px]:pt-10">
        <div class="mx-auto max-w-[1140px] px-5">
            <p class="m-0 mb-4 text-center text-[11px] font-bold uppercase tracking-[3px] text-film-red">The Approach</p>
            <h2 class="mx-auto m-0 mb-[30px] max-w-[16ch] text-center text-[42px] font-bold leading-[1.15] tracking-[-1px] text-black max-[575px]:text-[30px]">
                Strategy Before Execution
            </h2>
            <p class="mx-auto m-0 max-w-[72ch] text-center text-[18px] leading-[1.8] text-[#555] max-[575px]:text-[16px] max-[575px]:leading-[1.75]">
                Most marketing budgets are not wasted on bad execution. They are wasted on good execution
                pointed at the wrong audience, saying the wrong thing, in the wrong place. We deploy a
                research-based strategy with room for innovative developments, across all forms of
                traditional and non-traditional media — so every rupee that follows has a reason behind it.
            </p>
        </div>
    </section>

    {{-- ====================== SERVICES ====================== --}}
    {{--
        Text-only by design. Stock imagery never matches a client's brand palette,
        so the space goes to crawlable copy instead: each entry carries two
        paragraphs, which is what actually earns the page its long-tail queries.
    --}}
    <section class="bg-white pb-20" id="strategy-services">
        <div class="mx-auto max-w-[1140px] px-5">
            @php
            $services = [
                [
                    'icon'  => 'positioning',
                    'title' => 'Brand & Communication Strategy',
                    'lead'  => "Before design, before media, before a single campaign — the decisions about what your brand stands for, who it is genuinely for, and how it should sound when it speaks.",
                    'body'  => "We define positioning, purpose, personality, and messaging architecture, then write them down in a form your whole team can act on. This becomes the reference every later decision gets measured against, which is what stops your campaigns from quietly contradicting each other across channels and quarters.",
                    'items' => ['Positioning statement', 'Brand purpose & values', 'Brand personality', 'Messaging architecture', 'Tone of voice framework', 'Written strategy document'],
                ],
                [
                    'icon'  => 'research',
                    'title' => 'Market Research & Consumer Insight',
                    'lead'  => "Opinion is cheap and abundant. We replace it with evidence — what your market actually believes, what your competitors actually own, and where the genuine opening is.",
                    'body'  => "Depending on the decision at hand we run stakeholder interviews, customer conversations, category and competitor analysis, search demand study, and audits of your own sales and campaign data. The output is not a deck of charts; it is a short list of things that are true, and what each one means for where you spend next.",
                    'items' => ['Stakeholder interviews', 'Customer conversations', 'Category & competitor analysis', 'Search demand study', 'Sales & campaign data audit', 'Insight summary'],
                ],
                [
                    'icon'  => 'gtm',
                    'title' => 'Go-To-Market Strategy',
                    'lead'  => "A launch is the most expensive moment to be wrong. Go-to-market strategy sequences the audience, message, pricing, channel, and timing so a launch compounds instead of fizzling.",
                    'body'  => "We define the beachhead segment, the proposition that will move it, the proof required to make that proposition credible, and the channel sequence to reach it efficiently. We also define what we expect to happen — so if reality disagrees in week three, you find out in week three rather than after the budget is spent.",
                    'items' => ['Beachhead segment definition', 'Core proposition', 'Proof & credibility plan', 'Channel sequencing', 'Launch timeline', 'Expected-outcome benchmarks'],
                ],
                [
                    'icon'  => 'channels',
                    'title' => 'Media Planning & Channel Strategy',
                    'lead'  => "Every channel will happily take your money. Channel strategy decides which ones deserve it, in what proportion, and what each is actually being asked to achieve.",
                    'body'  => "We build the channel mix against your objective and margin rather than against fashion — balancing reach and conversion, paid and organic, digital and traditional. Budgets are allocated with a stated rationale and a review cadence, so spend shifts on evidence rather than on whoever argues hardest in the meeting.",
                    'items' => ['Channel mix & rationale', 'Budget allocation model', 'Paid & organic balance', 'Reach vs conversion split', 'Media flowchart', 'Review cadence'],
                ],
                [
                    'icon'  => 'content',
                    'title' => 'Content Strategy',
                    'lead'  => "Publishing more is not a strategy. Content strategy decides what is worth making, for whom, on which platform, and how it earns its keep.",
                    'body'  => "We map content to the questions your buyers actually ask at each stage, identify the search and social demand worth competing for, and set the formats, cadence, and ownership to sustain it. The point is a system your team can keep running after we leave, not a burst of activity that stops when the retainer does.",
                    'items' => ['Buyer question mapping', 'Search & social demand study', 'Pillars & format definition', 'Publishing cadence', 'Ownership & workflow', 'Content calendar template'],
                ],
            ];

            /*
             * Line marks for the left rail, one per service. Drawn rather than
             * pulled from an icon set so each one says something specific about
             * its service instead of being a generic glyph.
             *
             * Shared spec with the marks on the branding service page, so the two
             * pages read as one system:
             *   - 56x56 viewBox, 2px strokes, round caps and joins
             *   - structural strokes use currentColor, so the wrapper's text
             *     colour drives them and the whole mark can transition to red
             *     on hover with no per-path rules
             *   - exactly one film-red accent each, marking the "point" of the
             *     idea: the direction chosen, the evidence found, the launch, the
             *     channel that earns the money, the thing worth publishing
             */
            $strategyIcons = [

                // Compass: the decision about which way the brand faces.
                'positioning' => <<<'SVG'
                    <circle cx="28" cy="28" r="24" stroke="currentColor" stroke-width="2"/>
                    <path d="M39 17 32 32 17 39 24 24z" stroke="#E50914" stroke-width="2"/>
                    <circle cx="28" cy="28" r="2.5" fill="#E50914"/>
                SVG,

                // Magnifier with the data inside it: evidence, not opinion.
                'research' => <<<'SVG'
                    <circle cx="23" cy="23" r="18" stroke="currentColor" stroke-width="2"/>
                    <path d="M36 36 51 51" stroke="currentColor" stroke-width="2"/>
                    <path d="M17 29v-7M23 29V16M29 29v-10" stroke="#E50914" stroke-width="2"/>
                SVG,

                // Staircase to a planted flag: the launch, sequenced.
                'gtm' => <<<'SVG'
                    <path d="M4 50h12V39h12V28h12V17h12" stroke="currentColor" stroke-width="2"/>
                    <path d="M45 17V4" stroke="#E50914" stroke-width="2"/>
                    <path d="M45 5h9l-3 4 3 4h-9z" fill="#E50914"/>
                SVG,

                // One hub, three channels, and the one that earns the budget.
                'channels' => <<<'SVG'
                    <circle cx="9" cy="28" r="6" stroke="currentColor" stroke-width="2"/>
                    <path d="M15 28h11M26 28V12h13M26 28h13M26 28v16h13" stroke="currentColor" stroke-width="2"/>
                    <circle cx="45" cy="12" r="6" fill="#E50914"/>
                    <circle cx="45" cy="28" r="6" stroke="currentColor" stroke-width="2"/>
                    <circle cx="45" cy="44" r="6" stroke="currentColor" stroke-width="2"/>
                SVG,

                // A stack of planned pieces, the next one up in red.
                'content' => <<<'SVG'
                    <rect x="7" y="6" width="42" height="12" rx="3" fill="#E50914"/>
                    <rect x="7" y="22" width="42" height="12" rx="3" stroke="currentColor" stroke-width="2"/>
                    <rect x="7" y="38" width="42" height="12" rx="3" stroke="currentColor" stroke-width="2"/>
                SVG,
            ];
            @endphp

            {{--
                Full-width rows rather than a card grid: five items in two columns
                leaves an orphan. Title sticks to the left rail on desktop while
                the copy scrolls past it.
            --}}
            <div class="mb-12 text-center max-[575px]:mb-9">
                <p class="m-0 mb-3 text-[11px] font-bold uppercase tracking-[3px] text-film-red">What We Do</p>
                <h2 class="m-0 text-[42px] font-bold leading-[1.15] tracking-[-1px] text-black max-[575px]:text-[30px]">
                    Five Decisions Worth Getting Right
                </h2>
            </div>

            <div class="border-t border-solid border-[#e8e8e8]">
                @foreach($services as $i => $service)
                <article class="group grid grid-cols-1 gap-x-16 gap-y-6 border-b border-solid border-[#e8e8e8] py-14 transition-colors duration-300 lg:grid-cols-12 max-[767px]:gap-y-4 max-[767px]:py-10">

                    {{-- Left rail: number + title + mark --}}
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
                                what was just read.
                            --}}
                            <span aria-hidden="true"
                                  class="mt-6 hidden text-[#111] transition-colors duration-300 group-hover:text-film-red lg:block">
                                <svg viewBox="0 0 56 56" width="60" height="60" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round" role="presentation" focusable="false">
                                    {!! $strategyIcons[$service['icon']] !!}
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
                            Deliverables, drawn from what the two paragraphs above
                            already promise. The branding page carries the same
                            list; these are the concrete, searchable phrases the
                            prose describes but never names outright. Two columns
                            on desktop, one on mobile where a 2-col list would wrap
                            every label.
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

                    {{-- The mobile full-width button: at 375px the old
                         whitespace-nowrap button was ~180px wide and sat orphaned
                         on its own line against the left edge. --}}
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
                <h2 class="mx-auto m-0 max-w-[14ch] text-[42px] font-bold leading-[1.15] tracking-[-1px] text-black [text-wrap:balance] max-[575px]:text-[30px]">
                    Brands We've <span class="text-film-red">Built For</span>
                </h2>
            </div>

            {{-- Hairline cell borders turn 20 loose logos into a deliberate grid.
                 border-r/-b on the container closes the right and bottom edges that
                 per-cell top/left rules leave open. 20 divides evenly by 2, 4 and
                 5, so no breakpoint ends on a short row. --}}
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
                    balanced wrap lets the browser choose the break at each width
                    instead.
                --}}
                <blockquote class="relative z-[1] m-0 text-[32px] font-medium leading-[1.5] tracking-[-0.5px] text-white [text-wrap:balance] max-[767px]:text-[26px] max-[575px]:text-[21px] max-[575px]:leading-[1.55]">
                    Strategy is not about doing more. It is about deciding what to leave out.
                </blockquote>
            </figure>
        </div>
    </section>

    {{-- ====================== FAQ ====================== --}}
    {{--
        <details>/<summary> rather than a JS accordion: the answers stay in the DOM
        and remain crawlable whether or not the panel is open, and it works with
        no script at all. $strategyFaqs is defined in @section('head') so the same
        array feeds the FAQPage schema -- copy and markup cannot drift apart.
    --}}
    <section class="bg-white py-20" id="strategy-faq">
        <div class="mx-auto max-w-[900px] px-5">
            <div class="mb-12 text-center">
                <p class="m-0 mb-3 text-[11px] font-bold uppercase tracking-[3px] text-film-red">Common Questions</p>
                <h2 class="m-0 text-[42px] font-bold leading-[1.15] text-black max-[575px]:text-[30px]">
                    Strategy FAQs
                </h2>
            </div>

            @foreach($strategyFaqs as $faq)
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
                <h4 class="m-0 mb-3 text-[38px] font-light tracking-[-0.5px] text-[#999] max-[575px]:text-[24px]">Research. Decide. Execute.</h4>
                <h2 class="mx-auto m-0 max-w-[20ch] text-[42px] font-bold leading-[1.15] tracking-[-1px] text-black max-[575px]:text-[30px]">Strategy That Survives Contact With the Market</h2>
            </div>
            <p class="mx-auto m-0 max-w-[72ch] text-center text-[18px] leading-[1.8] text-[#555] max-[575px]:text-[16px]">
                A strategy that only works in the deck is not a strategy. We pressure-test every
                recommendation against budget, timeline, and the team who has to run it — then stay
                close enough to adjust when the market says something we did not expect.
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
