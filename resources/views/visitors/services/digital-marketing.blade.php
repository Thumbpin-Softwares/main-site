@extends('layout.visitor', [
    'title' => 'Best Digital Marketing Agency in Gurgaon - IND',
    'description' => 'Thumbpin is a digital advertising agency in Gurgaon that can help your business expand and stay connected effectively with your customer throughout their digital journey.',
    'keywords' => 'digital marketing agency gurgaon, digital marketing company gurugram, online marketing agency delhi ncr, social media marketing agency, performance marketing agency, seo services gurgaon, ppc agency india, google ads agency, meta ads agency, digital advertising agency, full service digital marketing, lead generation agency, how much does digital marketing cost, how long does seo take to work, which marketing channels should i use, difference between seo and paid ads',
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

{{-- The only rule Tailwind has no utility for: -webkit-text-stroke. --}}
<style>
.hero-title-outline { color: transparent; -webkit-text-stroke: 2px rgba(255,255,255,0.6); }
@media (max-width: 767px) { .hero-title-outline { -webkit-text-stroke-width: 1px; } }

/* Inquiry form. Always expanded, so no accordion rules here. */
::placeholder { color: #444; }
@media (max-width: 768px) {
    .inquiry-grid { grid-template-columns: 1fr !important; }
}
</style>

{{--
    One source of truth for the FAQs: this array renders the visible <details>
    list further down AND the FAQPage schema below, so the structured data can
    never claim something the page does not actually say -- which is what
    triggers a manual action.

    Organization @id matches /services, /about and the other service pages so all
    of them describe the same entity rather than several unrelated ones.
--}}
@php
$dmFaqs = [
    ['q' => 'How much does digital marketing cost in Gurgaon?',
     'a' => "It depends on which channels you need and how competitive your category is. A focused engagement on one or two channels sits well below a full-funnel programme running SEO, paid search, paid social and content together. Media spend is separate from our fee, and we are explicit about which is which so you always know what buys reach and what buys work."],

    ['q' => 'How long before digital marketing shows results?',
     'a' => "Paid channels can produce measurable traffic and leads within days of launch, though the first few weeks are largely learning and optimisation. SEO is slower by nature — typically three to six months before meaningful movement, longer in competitive categories. Social and content build gradually but compound. We set the expected timeline per channel before anything starts."],

    ['q' => 'Which channels should my business actually be on?',
     'a' => "Fewer than most agencies will tell you. The right mix depends on where your buyers already spend attention, your margin per sale, and how considered the purchase is. A high-ticket B2B service and an impulse-buy consumer product need almost opposite plans. We decide this from research rather than defaulting to whichever platform is fashionable."],

    ['q' => 'Do you handle the creative as well as the media buying?',
     'a' => "Yes, and that is the point of using us rather than a media-only agency. The same team that plans the channel strategy briefs the design and video work, so what runs is what was intended. Creative quality is usually a bigger lever on performance than bid tuning, and separating the two is where most campaigns lose their edge."],

    ['q' => 'How do you report on performance?',
     'a' => "Against the measures agreed before launch, not whichever metric happened to look good that month. Depending on the objective that could be cost per qualified lead, return on ad spend, organic visibility, or contribution by channel. You get a regular review with the numbers, what we changed, and what we are changing next."],

    ['q' => 'Do you work with small businesses and startups?',
     'a' => "Yes. Smaller budgets need tighter targeting, not lower standards — the cost of pointing a modest budget at the wrong audience is proportionally higher. Scope is matched to your stage rather than pushed into a fixed retainer that does not fit."],

    ['q' => 'Can you take over an account another agency set up?',
     'a' => "Regularly. We start with an audit of the existing account structure, tracking, and historical performance before changing anything, because inherited accounts often contain useful learning alongside the problems. You keep ownership of your ad accounts and analytics throughout."],

    ['q' => 'Which locations do you take digital marketing clients in?',
     'a' => "We work with clients across Gurgaon, Delhi NCR, and the rest of India. Reviews, reporting, and strategy sessions run effectively remotely, and we travel for on-site work where a project genuinely warrants it."],
];

$dmUrl = url()->current();
$orgId = config('app.url') . '/#organization';

$dmSchema = [
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
            '@id'         => $dmUrl . '/#service',
            'name'        => 'Digital Marketing',
            'serviceType' => 'Digital Marketing Agency',
            'url'         => $dmUrl,
            'provider'    => ['@id' => $orgId],
            'areaServed'  => ['@type' => 'City', 'name' => 'Gurugram'],
            'description' => 'Social media marketing, performance marketing and SEO from Thumbpin, serving Gurgaon and Delhi NCR.',
        ],
        [
            '@type'      => 'FAQPage',
            '@id'        => $dmUrl . '/#faq',
            'mainEntity' => array_map(fn ($faq) => [
                '@type'          => 'Question',
                'name'           => $faq['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
            ], $dmFaqs),
        ],
        [
            '@type' => 'BreadcrumbList',
            '@id'   => $dmUrl . '/#breadcrumb',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',              'item' => config('app.url') . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services',          'item' => route('services')],
                ['@type' => 'ListItem', 'position' => 3, 'name' => 'Digital Marketing', 'item' => $dmUrl],
            ],
        ],
    ],
];
@endphp
<script type="application/ld+json">
{!! json_encode($dmSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endsection

@section('content')
<main class="bg-white font-body overflow-x-hidden">

    {{-- ====================== HERO ====================== --}}
    {{--
        Matches /services/branding and /services/strategy. pt-[180px] clears the
        navbar: `header` is position:absolute; top:0 (assets/css/style.css), so it
        floats over this section rather than pushing it down.
    --}}
    <section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden bg-black px-5 pt-[180px] pb-[110px] max-[767px]:min-h-0 max-[767px]:pt-[150px] max-[767px]:pb-20">
        <div class="absolute inset-0 z-[1] bg-center bg-cover grayscale contrast-[1.1] opacity-40"
             style="background-image:url('{{ asset('img/services/digital-marketing.webp') }}');"></div>
        <div class="absolute inset-0 z-[2] bg-black/60"></div>
        <div class="absolute inset-0 z-[2]" style="background:radial-gradient(ellipse at center,transparent 30%,#000 85%);"></div>

        <div class="relative z-[3] mx-auto max-w-[900px] text-center">
            <h1 class="m-0 mb-6 text-[clamp(44px,9vw,110px)] font-extrabold uppercase leading-[0.92] tracking-[-2px] text-white opacity-0 translate-y-[30px] animate-hero-reveal [animation-delay:300ms]">
                Digital <span class="hero-title-outline">Marketing</span>
            </h1>

            <p class="mx-auto mb-10 max-w-[600px] text-[18px] font-light leading-[1.7] text-[#999] opacity-0 animate-hero-reveal [animation-delay:600ms]">
                We empower brands to tell their stories authentically and creatively, connecting with audiences on more than a surface level.
            </p>

            <div class="flex flex-wrap justify-center gap-[50px] opacity-0 animate-hero-reveal [animation-delay:900ms] max-[767px]:gap-[30px]">
                @foreach([['50+','Brands Served'],['12+','Channels Managed'],['6+','Years Experience']] as [$num, $label])
                <div class="text-center">
                    <div class="text-[42px] font-black leading-none text-film-red max-[767px]:text-[32px]">{{ $num }}</div>
                    <div class="mt-[6px] text-[11px] uppercase tracking-[2px] text-[#666]">{{ $label }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Visible breadcrumb, mirroring the BreadcrumbList schema in @section('head'). --}}
    @include('inc.breadcrumb', ['trail' => [
        ['Home',     route('home')],
        ['Services', route('services')],
        ['Digital Marketing', null],
    ]])

    {{-- ====================== INTRO ====================== --}}
    <section class="bg-white py-[60px]">
        <div class="mx-auto max-w-[1140px] px-5">
            <h2 class="m-0 mb-[30px] text-center text-[42px] font-bold text-black max-[575px]:text-[32px]">
                Driving Digital Marketing Success and Beyond
            </h2>
            <p class="mx-auto m-0 max-w-[900px] text-center text-[18px] leading-[1.8] text-[#666]">
                Every day is a new opportunity to shape the digital landscape for your brand and let the synergy of
                creativity flow with the strategy. We stay ahead in pushing boundaries by utilising AI for personalised
                marketing and adopting new platforms for enhanced reach. From captivating visuals to content, we create
                work that leaves a lasting impression on the audience.
            </p>
        </div>
    </section>

    {{-- ====================== SERVICES ====================== --}}
    {{--
        Same editorial row layout as /services/branding and /services/strategy:
        number + title on a sticky left rail, copy on the right. Text-only, so the
        space goes to crawlable content rather than stock imagery.
    --}}
    <section class="bg-white pb-20" id="dm-services">
        <div class="mx-auto max-w-[1140px] px-5">
            @php
            $services = [
                [
                    'title' => 'Social Media Management',
                    'route' => 'social-media-management',
                    'lead'  => "Social media management runs your channels day to day — cultivating brand communities, engaging audiences with relevant content, and expanding reach through a planned calendar rather than ad-hoc posting.",
                    'body'  => "We harness current trends, influencers, and user-generated content to increase your brand's visibility digitally. Community management sits alongside the content calendar rather than after it, because a following that never hears back is an audience you are renting, not one you own.",
                ],
                [
                    'title' => 'Performance Marketing',
                    'route' => 'performance-marketing-agency',
                    'lead'  => "Performance marketing focuses on driving measurable outcomes through targeted advertising campaigns and continuous, data-driven optimisation.",
                    'body'  => "The objective is return on investment, not impressions. We structure accounts around your actual margin, watch the metrics that predict revenue rather than the ones that flatter a report, and shift budget between channels on evidence. Creative is briefed by the same team, because a well-tuned bid on a weak ad is a ceiling you cannot optimise past.",
                ],
                [
                    'title' => 'Search Engine Optimization (SEO)',
                    'route' => 'search-engine-optimization-seo-services',
                    'lead'  => "Search Engine Optimization is the backbone of digital visibility, positioning your site to rank for the searches your buyers are already making.",
                    'body'  => "Through keyword strategy, content optimisation, and technical fixes, SEO grows organic traffic you do not pay per click for. It compounds slowly and then holds — the opposite shape to paid, which is why the two belong in the same plan rather than competing for the same budget.",
                ],
            ];
            @endphp

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

                    {{-- Right: copy + link --}}
                    <div class="lg:col-span-8">
                        <p class="m-0 mb-5 text-[18px] leading-[1.7] text-[#333] max-[575px]:text-[16px]">
                            {{ $service['lead'] }}
                        </p>
                        <p class="m-0 mb-6 text-[15px] leading-[1.85] text-[#777]">
                            {{ $service['body'] }}
                        </p>
                        <a href="{{ route($service['route']) }}"
                           class="inline-flex items-center gap-2 text-[13px] font-bold uppercase tracking-[1.5px] text-black no-underline transition-colors duration-200 hover:text-film-red">
                            Explore More
                            <span aria-hidden="true" class="transition-transform duration-200 group-hover:translate-x-1">&rarr;</span>
                        </a>
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

        {{-- Section header. A plain div, not a button: the form below is always
             expanded, so a control that toggles nothing would mislead both users
             and screen readers. --}}
        <div class="w-full bg-black border-0 border-t border-b border-[#1e1e1e] flex items-center justify-between">
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
                    Friends <span class="text-film-red">On Board</span>
                </h2>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach(range(1, 20) as $i)
                <div class="group flex min-h-[120px] items-center justify-center p-5 transition-transform duration-300 hover:scale-110">
                    <img src="{{ asset('assets/img/clients/' . $i . '.png') }}"
                         alt="Client Logo"
                         loading="lazy"
                         decoding="async"
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
            {{-- The oversized quote mark is a ::before in CSS terms; here it is a
                 real element so it stays pure Tailwind. aria-hidden as it is decor. --}}
            <div class="relative mx-auto max-w-[900px] text-center">
                <span aria-hidden="true"
                      class="pointer-events-none absolute left-1/2 top-[-80px] z-0 -translate-x-1/2 font-serif text-[200px] leading-none text-film-red/50 max-[575px]:top-[-60px] max-[575px]:text-[150px]">"</span>
                <p class="relative z-[1] m-0 text-[32px] font-medium leading-[1.6] text-white max-[575px]:text-[22px]">
                    Good marketing makes the company look smart.<br>
                    Great marketing makes the customer feel smart.
                </p>
            </div>
        </div>
    </section>

    {{-- ====================== FAQ ====================== --}}
    {{--
        <details>/<summary> rather than a JS accordion: the answers stay in the DOM
        and remain crawlable whether or not the panel is open, and it works with
        no script at all. $dmFaqs is defined in @section('head') so the same array
        feeds the FAQPage schema -- copy and markup cannot drift apart.
    --}}
    <section class="bg-white py-20" id="dm-faq">
        <div class="mx-auto max-w-[900px] px-5">
            <div class="mb-12 text-center">
                <p class="m-0 mb-3 text-[11px] font-bold uppercase tracking-[3px] text-film-red">Common Questions</p>
                <h2 class="m-0 text-[42px] font-bold leading-[1.15] text-black max-[575px]:text-[30px]">
                    Digital Marketing FAQs
                </h2>
            </div>

            @foreach($dmFaqs as $faq)
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
    <section class="bg-white py-[100px]">
        <div class="mx-auto max-w-[1140px] px-5">
            <div class="mb-10 text-center">
                <h4 class="m-0 mb-[10px] text-[38px] font-normal text-[#666] max-[575px]:text-[26px]">Innovate. Influence. Inspire</h4>
                <h2 class="m-0 text-[42px] font-bold text-black max-[575px]:text-[32px]">Transforming Ideas into Digital Marketing Services</h2>
            </div>
            <p class="mx-auto m-0 max-w-[900px] text-center text-[18px] leading-[1.8] text-[#666]">
                We begin by understanding your brand's aspirations and challenges to track and analyse the overall
                performance. This makes us an extension of your team, achieving shared goals by incorporating strategy,
                innovation, creativity and data driven insights on multiple channels. Our integrated approach works
                together to enhance brand visibility and drive meaningful engagement.
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
                       class="inline-block rounded bg-[#e20a15] px-10 py-[15px] font-semibold text-white no-underline transition-all duration-300 hover:-translate-y-[2px] hover:bg-[#c91820]">
                        Get In Touch
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
