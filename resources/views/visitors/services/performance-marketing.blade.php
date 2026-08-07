@extends('layout.visitor', [
    'title' => 'Performance Marketing Agency in Gurgaon | Google & Meta Ads',
    'description' => 'Thumbpin runs performance marketing for brands in Gurgaon and Delhi NCR — Google Ads, Meta Ads, funnels and landing pages, email retention, and tracking built so every rupee is attributable.',
    'keywords' => 'performance marketing agency gurgaon, google ads agency gurgaon, meta ads agency india, ppc agency delhi ncr, paid media agency gurugram, lead generation agency india, conversion rate optimisation agency, sales funnel agency, roas optimisation, ecommerce ads agency, google ads management company, facebook ads agency gurgaon',
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
$pmFaqs = [
    ['q' => 'What is performance marketing, and how is it different from digital marketing?',
     'a' => "Digital marketing is the whole field — content, social, SEO, email, ads. Performance marketing is the subset where you pay for a measurable action and judge it on cost per outcome rather than reach. Every rupee is traceable to a click, a lead or a sale. That makes it the fastest channel to prove or disprove, which is exactly why it is usually the first place we look when a business needs pipeline this quarter."],

    ['q' => 'What ad budget do I need to start?',
     'a' => "Enough for the platforms to actually learn, which in most categories in India means a meaningful monthly spend rather than a token test. Too small a budget produces data too noisy to act on, and you end up concluding a channel does not work when you never gave it a chance to. We will tell you honestly if your budget is below the floor for your category instead of taking the retainer anyway."],

    ['q' => 'How long before I see results?',
     'a' => "Traffic and leads can start within days. Reliable results take longer — the first four to six weeks are largely learning: which audiences respond, which creative earns the click, which landing page converts. Judging a campaign in week two is the most common and most expensive mistake, because the algorithm is still exploring and the numbers you are reacting to are not yet real."],

    ['q' => 'Do you run Google Ads and Meta Ads, or just one?',
     'a' => "Both, and they do different jobs. Google captures people already searching for what you sell — high intent, limited volume, priced accordingly. Meta creates demand among people who were not looking, which is cheaper per click but needs stronger creative and a longer path to conversion. Most accounts need both; which gets the larger share depends on your category, not on habit."],

    ['q' => 'Who writes the ad creative?',
     'a' => "We do — copy and visuals, produced against the campaign rather than adapted from whatever exists. On Meta especially, creative is the largest single lever on performance; targeting matters far less than it used to now that the platforms optimise delivery themselves. We plan for a steady flow of new creative, because fatigue is real and the same ad stops working long before you get bored of it."],

    ['q' => 'How do you track and attribute results?',
     'a' => "Conversion tracking, server-side events where the platform supports it, and UTM discipline so reporting is not guesswork. We set this up before spending, not after — retrofitting tracking onto a running campaign means the first month of data is unusable. We are also honest about attribution's limits: with iOS restrictions and multi-touch journeys, no platform report is the whole truth, and anyone claiming otherwise is selling something."],

    ['q' => 'Do you also fix the landing page, or only run the ads?',
     'a' => "Both, because they are the same problem. Sending expensive traffic to a page that loads slowly or buries the form is the quickest way to waste a budget, and it is usually cheaper to fix the page than to keep bidding harder. Landing pages, funnel structure and conversion rate work sit inside the engagement rather than being someone else's department."],

    ['q' => 'What do your reports actually show?',
     'a' => "Spend, cost per lead or acquisition, conversion rate, and return on ad spend — plus what we changed and why. Impressions and clicks are context, not the headline; they are the easiest numbers to make look impressive and tell you the least about whether the money worked. If a month went badly, the report says so and says what we are changing."],
];

$pmUrl = url()->current();
$orgId = config('app.url') . '/#organization';

$pmSchema = [
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
            '@id'         => $pmUrl . '/#service',
            'name'        => 'Performance Marketing',
            'serviceType' => 'Performance Marketing',
            'url'         => $pmUrl,
            'provider'    => ['@id' => $orgId],
            'areaServed'  => ['@type' => 'City', 'name' => 'Gurugram'],
            'description' => 'Performance marketing from Thumbpin — Google Ads, Meta Ads, funnels and landing pages, email retention and conversion tracking, serving Gurgaon and Delhi NCR.',
        ],
        [
            '@type'      => 'FAQPage',
            '@id'        => $pmUrl . '/#faq',
            'mainEntity' => array_map(fn ($faq) => [
                '@type'          => 'Question',
                'name'           => $faq['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
            ], $pmFaqs),
        ],
        [
            '@type' => 'BreadcrumbList',
            '@id'   => $pmUrl . '/#breadcrumb',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',                  'item' => config('app.url') . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services',              'item' => route('services')],
                ['@type' => 'ListItem', 'position' => 3, 'name' => 'Performance Marketing', 'item' => $pmUrl],
            ],
        ],
    ],
];
@endphp
<script type="application/ld+json">
{!! json_encode($pmSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
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
             style="background-image:url('{{ asset('img/services/performance-marketing.jpg') }}');"></div>
        <div class="absolute inset-0 z-[2] bg-black/60"></div>
        <div class="absolute inset-0 z-[2]" style="background:radial-gradient(ellipse at center,transparent 30%,#000 85%);"></div>

        <div class="relative z-[3] mx-auto max-w-[900px] text-center">
            <h1 class="m-0 mb-6 text-[clamp(44px,9vw,110px)] font-extrabold uppercase leading-[0.92] tracking-[-2px] text-white opacity-0 translate-y-[30px] animate-hero-reveal [animation-delay:300ms]">
                Performance <span class="hero-title-outline">Marketing</span>
            </h1>

            <p class="mx-auto mb-10 max-w-[620px] text-[18px] font-light leading-[1.7] text-[#999] opacity-0 animate-hero-reveal [animation-delay:600ms]">
                Not clicks and impressions — campaigns judged on cost per outcome, and reported the same way.
            </p>

            <div class="flex flex-wrap justify-center gap-[50px] opacity-0 animate-hero-reveal [animation-delay:900ms] max-[767px]:gap-[30px]">
                @foreach([['5','Disciplines Covered'],['100%','Tracked & Reported'],['6+','Years Experience']] as [$num, $label])
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
                Spend That Can Be Accounted For
            </h2>
            <p class="mx-auto m-0 max-w-[900px] text-center text-[18px] leading-[1.8] text-[#666]">
                Performance marketing is the one channel where the maths is not up for debate: you know what
                you spent, what it returned, and whether to do more of it next month. Getting there takes
                creative worth clicking, landing pages that do not waste the visit, and tracking set up before
                the first rupee goes out rather than after. We handle all three, and report on cost per
                outcome rather than the numbers that merely look impressive.
            </p>
        </div>
    </section>

    {{-- ====================== SERVICES ====================== --}}
    {{--
        Same editorial row layout as the other service pages: number + title on a
        sticky left rail, copy on the right.
    --}}
    <section class="bg-white pb-20" id="pm-services">
        <div class="mx-auto max-w-[1140px] px-5">
            @php
            $services = [
                [
                    'title' => 'Google Ads',
                    'lead'  => "Capturing the people already searching for what you sell — the highest-intent traffic available, priced accordingly.",
                    'body'  => "Search, Shopping, Performance Max and remarketing, structured so budget follows the keywords that convert rather than the ones that merely get volume. We build out negative keyword lists properly, because in most accounts the fastest saving available is simply not paying for searches that were never going to buy. Bidding is managed against cost per acquisition, not position.",
                ],
                [
                    'title' => 'Meta Ads',
                    'lead'  => "Creating demand on Instagram and Facebook among people who were not looking for you yet — where creative, not targeting, is the lever that matters.",
                    'body'  => "The platforms now optimise delivery themselves, so the old craft of narrow audience targeting has largely been replaced by producing enough good creative to give the algorithm something to work with. We plan a steady flow of new hooks, formats and angles, test them against each other, and retire what has fatigued — which happens long before you get bored of seeing it.",
                ],
                [
                    'title' => 'Funnels & Landing Pages',
                    'lead'  => "Where the traffic lands, and what happens after — because it is usually cheaper to fix the page than to keep bidding harder.",
                    'body'  => "We design and build landing pages against the campaign rather than pointing ads at a homepage and hoping. Load speed, a single clear action, a form that asks only what you actually need — these decide whether the click you just paid for turns into anything. Beyond the page, we map the full journey from first ad to enquiry so prospects are not dropped between steps.",
                ],
                [
                    'title' => 'Email Marketing & Retention',
                    'lead'  => "The cheapest revenue you have — sequences that turn leads into customers and customers into repeat ones.",
                    'body'  => "Welcome flows, nurture sequences for leads not yet ready, abandoned-cart and abandoned-enquiry recovery, and re-engagement for people who have gone quiet. Segmentation is behaviour-based rather than a single list, and deliverability setup — SPF, DKIM, DMARC — is handled properly, since it decides whether any of this reaches an inbox at all.",
                ],
                [
                    'title' => 'Tracking, Analytics & CRO',
                    'lead'  => "Conversion tracking configured before launch, and a continuous audit of where users drop out.",
                    'body'  => "Conversion events, server-side tracking where supported, and consistent UTM discipline so reporting is not guesswork. Then the ongoing part: reviewing where people abandon — slow pages, confusing navigation, checkout friction — and fixing it. We are also straight about attribution's limits. With privacy restrictions and multi-touch journeys, no platform report is the complete picture, and anyone telling you otherwise is selling something.",
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

                    {{-- Right: copy --}}
                    <div class="lg:col-span-8">
                        <p class="m-0 mb-5 text-[18px] leading-[1.7] text-[#333] max-[575px]:text-[16px]">
                            {{ $service['lead'] }}
                        </p>
                        <p class="m-0 text-[15px] leading-[1.85] text-[#777]">
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
                    We deliver analytics into marketing.<br>
                    We transform clicks into conversions.
                </p>
            </div>
        </div>
    </section>

    {{-- ====================== FAQ ====================== --}}
    {{--
        <details>/<summary> rather than a JS accordion: the answers stay in the DOM
        and remain crawlable whether or not the panel is open, and it works with
        no script at all. $pmFaqs is defined in @section('head') so the same array
        feeds the FAQPage schema -- copy and markup cannot drift apart.
    --}}
    <section class="bg-white py-20" id="pm-faq">
        <div class="mx-auto max-w-[900px] px-5">
            <div class="mb-12 text-center">
                <p class="m-0 mb-3 text-[11px] font-bold uppercase tracking-[3px] text-film-red">Common Questions</p>
                <h2 class="m-0 text-[42px] font-bold leading-[1.15] text-black max-[575px]:text-[30px]">
                    Performance Marketing FAQs
                </h2>
            </div>

            @foreach($pmFaqs as $faq)
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
                <h4 class="m-0 mb-[10px] text-[38px] font-normal text-[#666] max-[575px]:text-[26px]">Test. Measure. Scale.</h4>
                <h2 class="m-0 text-[42px] font-bold text-black max-[575px]:text-[32px]">Growth You Can Put a Number On</h2>
            </div>
            <p class="mx-auto m-0 max-w-[900px] text-center text-[18px] leading-[1.8] text-[#666]">
                Whether it is tightening a sales funnel, rewriting the creative that has stopped working, or
                fixing the landing page quietly wasting a third of your budget, the job is the same: find
                where the money is leaking and close it. Then spend more, with reason to believe it will
                return.
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
                         decoding="async"
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
