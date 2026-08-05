@extends('layout.visitor', [
    'title' => 'Marketing Strategy Agency in Gurgaon | Brand & Media Planning | Thumbpin',
    'description' => 'Thumbpin builds research-led marketing and brand strategies — positioning, consumer insight, go-to-market planning and media strategy across traditional and digital channels.',
    'keywords' => 'marketing strategy agency gurgaon, brand strategy consultant, go to market strategy, media planning agency, communication strategy, market research agency india, content strategy agency',
    'image' => config('app.url') . '/img/og/strategy.png',
    'image_alt' => 'Thumbpin marketing strategy agency — brand and media planning in Gurgaon',
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

        <div class="relative z-[3] mx-auto max-w-[900px] text-center">
            <h1 class="m-0 mb-6 text-[clamp(44px,9vw,110px)] font-extrabold uppercase leading-[0.92] tracking-[-2px] text-white opacity-0 translate-y-[30px] animate-hero-reveal [animation-delay:300ms]">
                Marketing <span class="hero-title-outline">Strategy</span>
            </h1>

            <p class="mx-auto mb-10 max-w-[600px] text-[18px] font-light leading-[1.7] text-[#999] opacity-0 animate-hero-reveal [animation-delay:600ms]">
                Research-led thinking that decides where you play and how you win, before a single rupee goes into media.
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
                Strategy Before Execution
            </h2>
            <p class="mx-auto m-0 max-w-[900px] text-center text-[18px] leading-[1.8] text-[#666]">
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
                    'title' => 'Brand & Communication Strategy',
                    'lead'  => "Before design, before media, before a single campaign — the decisions about what your brand stands for, who it is genuinely for, and how it should sound when it speaks.",
                    'body'  => "We define positioning, purpose, personality, and messaging architecture, then write them down in a form your whole team can act on. This becomes the reference every later decision gets measured against, which is what stops your campaigns from quietly contradicting each other across channels and quarters.",
                ],
                [
                    'title' => 'Market Research & Consumer Insight',
                    'lead'  => "Opinion is cheap and abundant. We replace it with evidence — what your market actually believes, what your competitors actually own, and where the genuine opening is.",
                    'body'  => "Depending on the decision at hand we run stakeholder interviews, customer conversations, category and competitor analysis, search demand study, and audits of your own sales and campaign data. The output is not a deck of charts; it is a short list of things that are true, and what each one means for where you spend next.",
                ],
                [
                    'title' => 'Go-To-Market Strategy',
                    'lead'  => "A launch is the most expensive moment to be wrong. Go-to-market strategy sequences the audience, message, pricing, channel, and timing so a launch compounds instead of fizzling.",
                    'body'  => "We define the beachhead segment, the proposition that will move it, the proof required to make that proposition credible, and the channel sequence to reach it efficiently. We also define what we expect to happen — so if reality disagrees in week three, you find out in week three rather than after the budget is spent.",
                ],
                [
                    'title' => 'Media Planning & Channel Strategy',
                    'lead'  => "Every channel will happily take your money. Channel strategy decides which ones deserve it, in what proportion, and what each is actually being asked to achieve.",
                    'body'  => "We build the channel mix against your objective and margin rather than against fashion — balancing reach and conversion, paid and organic, digital and traditional. Budgets are allocated with a stated rationale and a review cadence, so spend shifts on evidence rather than on whoever argues hardest in the meeting.",
                ],
                [
                    'title' => 'Content Strategy',
                    'lead'  => "Publishing more is not a strategy. Content strategy decides what is worth making, for whom, on which platform, and how it earns its keep.",
                    'body'  => "We map content to the questions your buyers actually ask at each stage, identify the search and social demand worth competing for, and set the formats, cadence, and ownership to sustain it. The point is a system your team can keep running after we leave, not a burst of activity that stops when the retainer does.",
                ],
            ];
            @endphp

            {{--
                Full-width rows rather than a card grid: five items in two columns
                leaves an orphan. Title sticks to the left rail on desktop while
                the copy scrolls past it.
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

                    {{-- Right: copy --}}
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
                    Strategy is not about doing more.<br>
                    It is about deciding what to leave out.
                </p>
            </div>
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
                <h4 class="m-0 mb-[10px] text-[38px] font-normal text-[#666] max-[575px]:text-[26px]">Research. Decide. Execute.</h4>
                <h2 class="m-0 text-[42px] font-bold text-black max-[575px]:text-[32px]">Strategy That Survives Contact With the Market</h2>
            </div>
            <p class="mx-auto m-0 max-w-[900px] text-center text-[18px] leading-[1.8] text-[#666]">
                A strategy that only works in the deck is not a strategy. We pressure-test every
                recommendation against budget, timeline, and the team who has to run it — then stay
                close enough to adjust when the market says something we did not expect.
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
