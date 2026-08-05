@extends('layout.visitor', [
    'title' => 'Creative Agency Services in Gurgaon & Gurugram | Thumbpin',
    'description' => 'Branding, digital marketing, SEO, web design, video production and performance marketing from Thumbpin, a creative agency in Gurgaon and Gurugram.',
    'image' => config('app.url') . '/img/og/services.png',
    'image_alt' => 'Thumbpin creative agency services in Gurgaon and Gurugram',
    'keywords' => 'Thumbpin services, branding agency Gurgaon, advertising agency Gurgaon, digital marketing agency Gurgaon, creative agency Gurgaon, social media marketing Gurgaon, web design agency Gurgaon, website development Gurgaon, video production agency Gurgaon, event marketing agency Gurgaon, real estate marketing agency Gurgaon, real estate advertising agency Gurgaon, branding agency, advertising agency, digital marketing agency, creative agency, social media marketing agency, web design agency, website development company, video production agency, performance marketing agency, SEO agency, best marketing agency for small business, affordable digital marketing, how to market your business, grow brand on social media, increase online sales, get more customers online, what is branding, how does SEO work, what is digital marketing, how to grow business online, how to get leads from Instagram, how to rank on Google, what is performance marketing, difference between SEO and paid ads, how to increase website traffic, what is social media marketing, how to build a brand identity, what is content marketing, how to run Google ads, how to run Meta ads, how to generate leads online, what is UI UX design, how to make a business website, best way to advertise a business, why hire a marketing agency, AI automation for business, what is AI automation, how to automate business processes, AI tools for marketing, automate customer support with AI, AI chatbot for business, workflow automation, business process automation, how to save time with AI, AI for small business, marketing automation tools'
])

@section('head')
{{--
    Structured data. Built as one @graph so the entities are linked by @id rather
    than floating free: CollectionPage -> about -> Organization, and an ItemList of
    Service entries that mirrors the cards below. The Service urls double as a
    machine-readable statement of the hub -> service-page relationship.

    Organization @id matches the one on /about, so both pages describe the same
    entity instead of two unrelated ones.
--}}
@php
$servicesUrl  = config('app.url') . '/services';
$orgId        = config('app.url') . '/#organization';
$breadcrumbId = $servicesUrl . '/#breadcrumb';

// name => route (null where no dedicated page exists yet)
$serviceEntries = [
    'Branding'               => 'branding-agency',
    'Strategy'               => null,
    'Digital Marketing'      => 'digital-marketing',
    'Real Estate Video Ads'  => 'real-estate-ads',
    'Web Design'             => 'web-design-agency',
    'SEO Services'           => 'search-engine-optimization-seo-services',
    'Social Media Marketing' => 'social-media-marketing-agency',
    'Performance Marketing'  => 'performance-marketing-agency',
];

$itemList = [];
$position = 1;
foreach ($serviceEntries as $name => $route) {
    $service = [
        '@type'       => 'Service',
        'name'        => $name,
        'serviceType' => $name,
        'provider'    => ['@id' => $orgId],
        'areaServed'  => ['@type' => 'City', 'name' => 'Gurugram'],
    ];
    if ($route) {
        $service['url'] = route($route);
    }
    $itemList[] = ['@type' => 'ListItem', 'position' => $position++, 'item' => $service];
}

$schema = [
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type' => 'Organization',
            '@id'   => $orgId,
            'name'  => 'Thumbpin',
            'url'   => config('app.url') . '/',
        ],
        [
            '@type'       => 'CollectionPage',
            '@id'         => $servicesUrl . '/#webpage',
            'url'         => $servicesUrl,
            'name'        => 'Creative Agency Services in Gurgaon & Gurugram | Thumbpin',
            'description' => 'Branding, digital marketing, SEO, web design, video production and performance marketing from Thumbpin, a creative agency in Gurgaon and Gurugram.',
            'inLanguage'  => 'en-IN',
            'about'       => ['@id' => $orgId],
            'breadcrumb'  => ['@id' => $breadcrumbId],
            'mainEntity'  => ['@id' => $servicesUrl . '/#servicelist'],
        ],
        [
            '@type'           => 'ItemList',
            '@id'             => $servicesUrl . '/#servicelist',
            'name'            => 'Services offered by Thumbpin',
            'itemListElement' => $itemList,
        ],
        [
            '@type' => 'BreadcrumbList',
            '@id'   => $breadcrumbId,
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => config('app.url') . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => $servicesUrl],
            ],
        ],
    ],
];
@endphp
<script type="application/ld+json">
{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
<style>
.group:hover .svc-img {
    filter: grayscale(0%) !important;
    transform: scale(1.05) !important;
}
.svc-card .svc-img-wrap {
    margin: -28px -24px 18px;
}
@media (max-width: 991px) {
    .svc-card .svc-img-wrap {
        margin: -24px -20px 16px;
    }
}
@media (max-width: 576px) {
    .svc-card .svc-img-wrap {
        margin: -20px -16px 14px;
    }
}
.svc-btn-primary {
    display: inline-block;
    border: 2px solid #E50914;
    background: #E50914;
    color: #fff;
    padding: 8px 16px;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    text-decoration: none;
    border-radius: 4px;
    transition: background 0.25s ease, color 0.25s ease;
}
.svc-btn-primary:hover {
    background: transparent;
    color: #E50914;
}
.svc-btn-secondary {
    display: inline-block;
    border: 2px solid #ddd;
    background: transparent;
    color: #555;
    padding: 8px 16px;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    text-decoration: none;
    border-radius: 4px;
    transition: border-color 0.25s ease, color 0.25s ease;
}
.svc-btn-secondary:hover {
    border-color: #E50914;
    color: #E50914;
}
::placeholder { color: #444; }
.svc-inquiry-wrap { overflow: hidden; max-height: 0; opacity: 0; transition: max-height 0.45s ease, opacity 0.35s ease; }
.svc-inquiry-wrap.is-open { max-height: 800px; opacity: 1; }
@media (max-width: 768px) {
    .inquiry-grid { grid-template-columns: 1fr !important; }
}
</style>
@endsection

@section('content')

<main>

    {{-- ====================== Service-Hero-Sec Area (Three.js Revamp) ====================== --}}
    {{--
        Mobile layout notes:
        * .top-sec forces `padding-top: 0 !important` and <header> is absolutely
          positioned over the page, so the headline collided with the navbar.
          Hence !pt-[110px] -- the ! is required to beat that !important.
        * h-90-only is not defined in any stylesheet, so the container had no
          height and `align-items-center` had nothing to centre within, dropping
          the text to the top. Below 992px the section itself becomes the flex
          container that does the centring.
        Both overrides are max-[991px] only; desktop is untouched.
    --}}
    <div class="service-hero-sec top-sec bg-black max-[991px]:flex max-[991px]:items-center max-[991px]:!pt-[110px] max-[991px]:pb-[60px]" style="position: relative; overflow: hidden;">
        <div class="container h-90-only max-[991px]:w-full">
            <div class="row align-items-center h-90-only">
                <div class="col-lg-6">
                    {{-- Below 992px the Three.js column is hidden by d-none d-lg-block, so
                         the text is on its own and gets centred. text-align inherits, which
                         handles the label, the h1 and the paragraph from this one class. --}}
                    <div class="content-box max-[991px]:text-center">
                        <span class="block mb-5 font-body text-[14px] font-bold uppercase tracking-[3px] text-tp-red">
                        what do we offer
                    </span>
                        <h1 class="title max-[991px]:!text-[56px] max-[767px]:!text-[40px]" style="font-size: 80px; line-height: 0.9; font-weight: 800; color: #fff; letter-spacing: -2px; margin-bottom: 30px;">
                            WE ARE <br>
                            <span class="text-red">BEST AT</span>
                        </h1>
                        {{-- "border-solid" (not border-l-solid -- Tailwind has no per-side
                             style utility) is required here: css/shared.css is built without
                             preflight, which is what normally applies border-style globally,
                             so a width on its own renders nothing.

                             Centred text and a left accent bar do not mix, so below 992px the
                             border and its indent are dropped and the block is centred. --}}
                        <div class="max-w-[90%] border-l-4 border-r-0 border-t-0 border-b-0 border-solid border-tp-red pl-[25px] max-[991px]:mx-auto max-[991px]:max-w-full max-[991px]:border-l-0 max-[991px]:pl-0">
                        <p class="m-0 text-base leading-[1.6] text-neutral-400 max-[767px]:text-[17px]">
                                Creating unique business identities under our roof with integrated marketing solutions. We weave stories that make noise, amplify reach, and create wins.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div style="position: relative; height: 800px; display: flex; align-items: flex-end; justify-content: center; margin-left:20px;">
                        <!-- Three.js Canvas Container (Floating above) -->
                        <div id="cube-canvas-container" style="width: 80%; height: 80%; position: absolute; top: 110px; left: 0; z-index: 10;"></div>
                        
                        <!-- Hand Image -->
                        <div class="hand-img-container" style="position: relative; z-index: 1; width: 100%; text-align: center;">
                            <img src="{{ config('app.url') }}/assets/img/hand.png" alt="hand" style="max-width: 95%; display: block; margin: 0 auto;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Service-Hero-Sec Area ====================== --}}


    {{-- ====================== Sec-9 Area (Services Grid) ====================== --}}
    {{--
        Pure Tailwind. Two things to know before editing:
        * This page loads css/shared.css, which is built WITHOUT preflight, so
          borders need an explicit `border-solid` and headings/paragraphs need
          explicit `m-0` -- Tailwind has not reset Bootstrap's defaults here.
        * Hover states are driven by `group` on the card, so the accent bar,
          number badge, title, copy and arrow all react to one hover.
    --}}
    <div class="sec-9 bg-white py-[70px] max-[991px]:py-[70px]" id="sec-9">
        <div class="mx-auto w-full max-w-[1140px] px-[15px]">

            {{-- Intro band: copy left-aligned, CTA on the right. Sits inside the same
                 max-w-[1140px] container as the grid so its left edge lines up with
                 the first card. Vertical spacing is unchanged -- the gap before the
                 cards still comes from the grid's own mt-[60px]. --}}
            <div class="flex items-end justify-between gap-12 max-[991px]:flex-col max-[991px]:items-start max-[991px]:gap-8">
                <div class="max-w-[760px]">
                    {{-- h2, not h1: the hero already owns this page's single h1. --}}
                    <h2 class="m-0 font-display text-[34px] leading-[1.3] tracking-[-0.5px] text-black max-[991px]:text-[28px] max-[767px]:text-[24px]">
                        Our team of experienced professionals understands the ever-changing
                        landscape of marketing and is able to 
                        <span class="text-tp-red">create custom strategies for each client.</span>
                    </h2>
                </div>

                <a href="{{ route('contact') }}"
                   class="group inline-flex shrink-0 items-center gap-3 rounded-full border-0 bg-black px-8 py-4 font-body text-[14px] font-bold uppercase tracking-[1px] text-white no-underline transition-colors duration-300 hover:bg-tp-red hover:text-white max-[991px]:w-full max-[991px]:justify-center">
                    Get Started
                </a>
            </div>

            @php
            $services = [
                    ['01', 'Branding',               'Undertaking brand and market research to fathom brand goals and positioning, along with building on the existing voice and visual language.',                                                              'branding-agency',                        'branding.jpeg'],
                    ['02', 'Strategy',               'Deploying a research-based strategy with room for innovative developments, across all forms of traditional & non-traditional media.',                                                                     null,                                     'strategy.jpeg'],
                    ['03', 'Digital Marketing',      'We integrate marketing strategies & solutions to create distinctive conversations and reach a diverse audience through a unique online presence.',                                                          'digital-marketing',                      'digital-marketing.webp'],
                    ['04', 'Real Estate Video Ads',  'Cinematic property walkthroughs, drone aerials and promo films that help builders and brokers showcase their projects and sell faster.',                                                                   'real-estate-ads',                        'real-estate-video-ads.webp'],
                    ['05', 'Web Designing',          'Working with innovative UI/UX designs and infographics to establish a platform to connect with people.',                                                                                                   'web-design-agency',                      'web-design.jpeg'],
                    ['06', 'AI Automation',          'Automating repetitive workflows, customer touchpoints and data pipelines with AI so your team focuses on work that actually moves the needle.',                                                            null,                                     'ai-automation.webp'],
                    ['07', 'SEO Services',           'Technical and on-page SEO that grows organic visibility, so the right people find you without paying for every click.',                                                                                   'search-engine-optimization-seo-services', 'seo.jpg'],
                    ['08', 'Social Media Marketing', 'Content and community management that turns followers into a audience which actually converts.',                                                                                                           'social-media-marketing-agency',          'digital-marketing.webp'],
                    ['09', 'Performance Marketing',  'Paid campaigns built around measurable outcomes, optimised continuously against cost per acquisition.',                                                                                                   'performance-marketing-agency',           'performance-marketing.jpg'],
                    ['10', 'Events & Live',          'We take your brand out on a walk amidst society & concerts.',                                                                                                                                            null,                                     'events.jpg'],
                    ['11', 'Disruptive Ideas',       'We plan unprecedented solutions and ideas that take your brand to the front line of unique marketing campaigns.',                                                                                         null,                                     'disruptive-ideas.jpg'],
                    ['12', 'Friendship With Benefits','Got a specific project for us? We\'re here to provide our expertise.',                                                                                                                                   null,                                     'freinds-with-benefits.avif'],
            ];

            $card = 'group relative block overflow-hidden rounded-lg border border-solid border-[#e5e5e5]'
                  . ' bg-white p-[28px_24px] no-underline shadow-[0_2px_8px_rgba(0,0,0,0.04)]'
                  . ' transition-all duration-[400ms] ease-[cubic-bezier(0.4,0,0.2,1)]'
                  . ' hover:-translate-y-2 hover:border-tp-red hover:shadow-[0_12px_24px_rgba(0,0,0,0.12)]'
                  . ' max-[991px]:p-[24px_20px] max-[576px]:p-[20px_16px] svc-card';
            @endphp

            <div class="mt-[60px] grid grid-cols-3 gap-[24px] max-[991px]:mt-10 max-[991px]:grid-cols-2 max-[991px]:gap-[20px] max-[576px]:grid-cols-1 max-[576px]:gap-4">
                @foreach($services as [$num, $title, $desc, $route, $img])
                <div class="{{ $card }}" @if($route) style="cursor:pointer;" onclick="window.location='{{ route($route) }}'" @endif>

                    {{-- Accent bar --}}
                    <span class="absolute left-0 top-0 h-0 w-[4px] bg-tp-red transition-[height] duration-[400ms] ease-[cubic-bezier(0.4,0,0.2,1)] group-hover:h-full"></span>

                    {{-- Image flush to card edges --}}
                    <div class="svc-img-wrap relative overflow-hidden" style="height:200px;border-radius:8px 8px 0 0;">
                        <img src="{{ config('app.url') }}/img/services/{{ $img }}"
                             alt="{{ $title }}"
                             loading="lazy"
                             class="svc-img"
                             style="width:100%;height:100%;object-fit:cover;filter:grayscale(100%);transition:filter 0.4s ease,transform 0.4s ease;">
                        <span class="absolute top-3 left-3 rounded border border-solid border-tp-red px-3 py-[6px] font-mono text-[14px] font-bold text-tp-red" style="background:rgba(255,255,255,0.15);backdrop-filter:blur(6px);">
                            {{ $num }}
                        </span>
                    </div>

                    <h3 class="m-0 mb-[10px] text-[18px] font-extrabold uppercase leading-[1.2] tracking-[-0.5px] text-black transition-colors duration-300 group-hover:text-tp-red max-[991px]:text-[16px] max-[576px]:text-[17px]">
                        {{ $title }}
                    </h3>

                    <p class="m-0 mb-4 text-[13px] leading-[1.65] text-[#666] transition-colors duration-300 group-hover:text-[#333]">
                        {{ $desc }}
                    </p>

                    <div style="display:flex;gap:12px;flex-wrap:wrap;">
                        @if($route)
                        <a href="{{ route($route) }}" onclick="event.stopPropagation();" class="svc-btn-primary">Learn More</a>
                        @endif
                        <a href="{{ route('work') }}" onclick="event.stopPropagation();" class="svc-btn-secondary">Our Work</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- ====================== End Sec-9 Area ====================== --}}

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

    {{-- ====================== FAQ Area ====================== --}}
    <section class="bg-white py-[100px]">
        <div class="container">
            <div class="text-center mb-[60px]">
                <p class="text-[11px] tracking-[3px] text-tp-red uppercase font-bold mb-3">Got Questions</p>
                <h2 class="text-[clamp(32px,4vw,52px)] font-black uppercase leading-tight text-[#111] tracking-[-1px]">Frequently Asked Questions</h2>
            </div>

            <div class="max-w-[800px] mx-auto">
                @php
                $faqs = [
                    ['q' => 'What services does Thumbpin offer?', 'a' => 'Thumbpin is a full-service creative agency offering branding, digital marketing, SEO, social media marketing, performance marketing, web design, video production, real estate advertising, and AI automation everything your brand needs under one roof.'],
                    ['q' => 'How long does it take to see results from digital marketing?', 'a' => 'It depends on the channel. Paid ads can drive results within days, while SEO typically takes 3–6 months to gain momentum. Branding and social media build over time but create lasting equity. We set honest expectations from day one.'],
                    ['q' => 'Do you work with small businesses or only large brands?', 'a' => 'We work with businesses of all sizes from early-stage startups to established enterprises. Our strategies are tailored to your budget and goals, not a one-size-fits-all package.'],
                    ['q' => 'How does the onboarding process work?', 'a' => 'Start by filling out our inquiry form. We\'ll schedule a discovery call to understand your brand, goals, and challenges. From there we put together a custom strategy and get to work usually within a week of sign-off.'],
                    ['q' => 'Can you handle both creative and performance work together?', 'a' => 'Absolutely that\'s our edge. Most agencies split creative and performance into separate teams. At Thumbpin, strategy, creative, and performance marketing work together so your ads look great and actually convert.'],
                    ['q' => 'Do you offer AI automation services?', 'a' => 'Yes. We help businesses automate repetitive workflows, set up AI-powered customer support, build lead generation systems, and integrate AI tools into existing processes — saving time and scaling output without scaling headcount.'],
                    ['q' => 'How do I get started with Thumbpin?', 'a' => 'Hit the "Inquire Now" button above, fill in a few details, and we\'ll reach out within 24 hours. No long forms, no commitment required — just a conversation.'],
                ];
                @endphp

                @foreach($faqs as $i => $faq)
                <div class="border-b border-[#e8e8e8]">
                    <button class="w-full text-left flex items-center justify-between gap-4 py-6 bg-transparent border-0 cursor-pointer" onclick="toggleFaq({{ $i }})">
                        <span class="text-[16px] font-bold text-[#111] leading-snug">{{ $faq['q'] }}</span>
                        <span id="faq-icon-{{ $i }}" class="text-tp-red font-bold text-[22px] flex-shrink-0 transition-transform duration-300">+</span>
                    </button>
                    <div id="faq-body-{{ $i }}" class="overflow-hidden transition-all duration-300" style="max-height:0;">
                        <p class="text-[15px] text-[#555] leading-[1.75] pb-6">{{ $faq['a'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- ====================== End FAQ Area ====================== --}}

    {{-- ====================== Sec-3 Area (Refined) ====================== --}}
    <div class="sec-3 bg-white py-[120px]">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="relative">
                        <div class="overflow-hidden transition-all duration-500">
                            <img src="{{ config('app.url') }}/assets/img/service-01.png" alt="img" class="w-full block">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="mb-10">
                        <p class="text-[24px] tracking-[4px] text-tp-red uppercase mb-[10px] font-bold">Brand</p>
                        <b class="text-[60px] leading-none text-black font-semibold block">
                            Your Story
                        </b>
                    </div>
                    <div class="text-[#555] text-[18px] leading-[1.7] mb-10">
                        <p class="mb-5">
                            We are creatively strategic and strategically creative. We follow a research-based strategy to create memorable brand identities. Advertising is the aftertaste of a good story. So, Thumbpin weaves a unique tale for your brand punched together with design and production.
                        </p>
                    </div>
                    <a href="{{ route('contact') }}" class="inline-block bg-[#111] text-white no-underline font-bold uppercase tracking-[1px] py-[15px] px-[40px] rounded-[50px] transition-all duration-300">
                        Get In Touch
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Sec-3 Area ====================== --}}


</main>

<script>
function toggleFaq(index) {
    var body = document.getElementById('faq-body-' + index);
    var icon = document.getElementById('faq-icon-' + index);
    var isOpen = body.style.maxHeight !== '0px' && body.style.maxHeight !== '';

    document.querySelectorAll('[id^="faq-body-"]').forEach(function(el) {
        el.style.maxHeight = '0';
    });
    document.querySelectorAll('[id^="faq-icon-"]').forEach(function(el) {
        el.textContent = '+';
        el.style.transform = 'rotate(0deg)';
    });

    if (!isOpen) {
        body.style.maxHeight = body.scrollHeight + 'px';
        icon.textContent = '×';
        icon.style.transform = 'rotate(90deg)';
    }
}
</script>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Scene Setup
        const container = document.getElementById('cube-canvas-container');
        if (!container) return;

        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
        
        renderer.setSize(container.clientWidth, container.clientHeight);
        container.appendChild(renderer.domElement);

        // Lighting (Required for Solid Material)
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.6); // Soft white light
        scene.add(ambientLight);

        const directionalLight = new THREE.DirectionalLight(0xffffff, 0.8);
        directionalLight.position.set(5, 5, 5);
        scene.add(directionalLight);

        // Solid Red Cube
        const geometry = new THREE.BoxGeometry(2.2, 2.2, 2.2);
        // Using MeshStandardMaterial for better lighting reaction
        const material = new THREE.MeshStandardMaterial({ 
            color: 0xff0000, // Red
            roughness: 0.4,
            metalness: 0.1
        });
        const cube = new THREE.Mesh(geometry, material);
        cube.position.y = 0.5; // Move up slightly to float above hand
        scene.add(cube);

        // Camera Position
        camera.position.z = 5;

        // Animation Loop
        function animate() {
            requestAnimationFrame(animate);

            // Rotate Cube
            cube.rotation.x += 0.005;
            cube.rotation.y += 0.005;

            renderer.render(scene, camera);
        }
        animate();

        // Handle Resize
        window.addEventListener('resize', function() {
            if (container) {
                const width = container.clientWidth;
                const height = container.clientHeight;
                renderer.setSize(width, height);
                camera.aspect = width / height;
                camera.updateProjectionMatrix();
            }
        });
    });
</script>
@endsection
