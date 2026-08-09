@extends('layout.visitor', [
    'title' => 'Event Management & Brand Activation Agency in Gurgaon',
    'description' => 'Thumbpin plans and produces events, brand activations, corporate conferences, exhibitions and live shows across Gurgaon and Delhi NCR — from concept and design through on-ground execution.',
    'keywords' => 'event management agency gurgaon, brand activation agency india, corporate event company gurugram, exhibition stall design gurgaon, product launch agency delhi ncr, conference management company india, live event production agency, on ground marketing agency, mall activation agency, event branding agency gurgaon',
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
$evFaqs = [
    ['q' => 'What kinds of events do you handle?',
     'a' => "Brand activations and on-ground campaigns, corporate events and conferences, product launches, exhibitions and stall builds, and live shows. The common thread is that they are marketing events rather than social ones — there is a brand objective attached, and the format is chosen to serve it rather than picked first and justified later."],

    ['q' => 'Do you handle the creative as well as the logistics?',
     'a' => "Both, and that is the point of coming to an agency rather than an event contractor. The idea, the design language, the stage and stall build, the collateral and the post-event content all come from the same team — so the event looks like the rest of your brand instead of like a venue's default setup with your logo added at the end."],

    ['q' => 'How far in advance should we start planning?',
     'a' => "Six to eight weeks for a straightforward activation, and three months or more for a conference or anything involving custom fabrication, artist bookings or multi-city rollout. Venue availability and permissions are usually the constraint rather than the creative. Shorter timelines are possible, but they cost more and narrow your options — rush fabrication and last-minute venues are both priced accordingly."],

    ['q' => 'Do you manage vendors, permissions and licences?',
     'a' => "Yes. Venue negotiation, fabrication, AV, staffing, catering coordination, and the permissions and licences an event legally needs — including sound and public-gathering clearances where they apply. Working with vendors we have used before matters more than it sounds: on event day the difference between a good supplier and a cheap one is whether problems get solved quietly or become your problem."],

    ['q' => 'Can you run events outside Gurgaon and Delhi NCR?',
     'a' => "Yes. NCR is where we are most efficient because the vendor network is local, but we produce events in other cities and handle multi-city rollouts where a campaign needs the same execution repeated consistently. We are upfront about the additional travel and logistics cost rather than burying it in the estimate."],

    ['q' => 'How is an event budget usually structured?',
     'a' => "Roughly: venue, production and fabrication, AV and technical, staffing, and creative. Production is almost always the largest line and the one most affected by timeline. We give you the split rather than a single number, so when something has to be cut you can see what you are trading away instead of just approving a smaller total."],

    ['q' => 'Do you capture content at the event?',
     'a' => "Yes, and we plan it in from the start rather than sending a photographer on the day. An event lasts a few hours; the footage and photographs from it feed your social channels for months, so the shot list is built alongside the run sheet and moments are staged to be capturable rather than hoping something usable happens."],

    ['q' => 'What happens on the day itself?',
     'a' => "Our team is on ground from setup through teardown, running to a schedule agreed with you in advance, with a single point of contact so you are not fielding calls from six vendors. Something always deviates from plan — a delivery is late, a speaker moves, the weather turns — and the job is to absorb that without it reaching your guests or your leadership."],
];

$evUrl = url()->current();
$orgId = config('app.url') . '/#organization';

$evSchema = [
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
            '@id'         => $evUrl . '/#service',
            'name'        => 'Events & Live',
            'serviceType' => 'Event Management',
            'url'         => $evUrl,
            'provider'    => ['@id' => $orgId],
            'areaServed'  => ['@type' => 'City', 'name' => 'Gurugram'],
            'description' => 'Event management and brand activations from Thumbpin — corporate events, conferences, product launches, exhibitions and live shows, serving Gurgaon and Delhi NCR.',
        ],
        [
            '@type'      => 'FAQPage',
            '@id'        => $evUrl . '/#faq',
            'mainEntity' => array_map(fn ($faq) => [
                '@type'          => 'Question',
                'name'           => $faq['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
            ], $evFaqs),
        ],
        [
            '@type' => 'BreadcrumbList',
            '@id'   => $evUrl . '/#breadcrumb',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',          'item' => config('app.url') . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services',      'item' => route('services')],
                ['@type' => 'ListItem', 'position' => 3, 'name' => 'Events & Live', 'item' => $evUrl],
            ],
        ],
    ],
];
@endphp
<script type="application/ld+json">
{!! json_encode($evSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
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
             style="background-image:url('{{ asset('img/services/events.jpg') }}');"></div>
        <div class="absolute inset-0 z-[2] bg-black/60"></div>
        <div class="absolute inset-0 z-[2]" style="background:radial-gradient(ellipse at center,transparent 30%,#000 85%);"></div>

        <div class="relative z-[3] mx-auto max-w-[900px] text-center">
            <h1 class="m-0 mb-6 text-[clamp(44px,9vw,110px)] font-extrabold uppercase leading-[0.92] tracking-[-2px] text-white opacity-0 translate-y-[30px] animate-hero-reveal [animation-delay:300ms]">
                Events <span class="hero-title-outline">& Live</span>
            </h1>

            <p class="mx-auto mb-10 max-w-[620px] text-[18px] font-light leading-[1.7] text-[#999] opacity-0 animate-hero-reveal [animation-delay:600ms]">
                Activations, launches, conferences and live shows — planned, built and run on the ground.
            </p>

            <div class="flex flex-wrap justify-center gap-[50px] opacity-0 animate-hero-reveal [animation-delay:900ms] max-[767px]:gap-[30px]">
                @foreach([['5','Event Formats'],['360°','Concept To Teardown'],['6+','Years Experience']] as [$num, $label])
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
        ['Events & Live', null],
    ]])

    {{-- ====================== INTRO ====================== --}}
    <section class="bg-white py-[60px]">
        <div class="mx-auto max-w-[1140px] px-5">
            <h2 class="m-0 mb-[30px] text-center text-[42px] font-bold text-black max-[575px]:text-[32px]">
                The One Channel People Stand Inside
            </h2>
            <p class="mx-auto m-0 max-w-[900px] text-center text-[18px] leading-[1.8] text-[#666]">
                Every other channel competes for a few seconds of half-attention on a phone. An event gets
                people in a room, with their attention already given — which is why it is the most expensive
                thing you will do and the most wasteful to do badly. We plan events as brand work rather than
                logistics: the idea first, then the build, the run sheet, and the content that keeps it
                working long after everyone has gone home.
            </p>
        </div>
    </section>

    {{-- ====================== SERVICES ====================== --}}
    {{--
        Same editorial row layout as the other service pages: number + title on a
        sticky left rail, copy on the right.
    --}}
    <section class="bg-white pb-20" id="ev-services">
        <div class="mx-auto max-w-[1140px] px-5">
            @php
            $services = [
                [
                    'title' => 'Brand Activations',
                    'lead'  => "On-ground campaigns that put the brand in front of people where they already are — malls, campuses, markets, societies and public spaces.",
                    'body'  => "An activation earns attention rather than buying it, which means the idea has to be worth stopping for. We design the concept, build the setup, brief and train the staff who represent you, and plan the mechanic that captures something usable — a sample redeemed, a number collected, a post shared. Footfall on its own is not a result, so we agree what counts before we build anything.",
                ],
                [
                    'title' => 'Corporate Events & Conferences',
                    'lead'  => "Annual days, town halls, dealer meets, awards nights and conferences — run to a schedule, with your brand holding the room together.",
                    'body'  => "Stage design, AV, run sheet, speaker coordination, registration, hospitality and signage, treated as one brief rather than farmed out to unrelated suppliers. The design language carries through from the invite to the backdrop to the stage graphics, and someone owns the clock — because the difference between a good corporate event and a long one is usually whether anybody was managing the schedule.",
                ],
                [
                    'title' => 'Product Launches',
                    'lead'  => "Building a moment worth covering — the reveal, the room, the press and the content that outlives the evening.",
                    'body'  => "A launch has to work for three audiences at once: the people in the room, the media covering it, and everyone who will only ever see it as a thirty-second clip. We design for all three, which changes decisions about staging, lighting and sequencing. The content plan is built alongside the run sheet rather than after it, so the footage exists and is usable.",
                ],
                [
                    'title' => 'Exhibitions & Stall Design',
                    'lead'  => "Stands that get noticed on a crowded floor and are built to survive being assembled and dismantled repeatedly.",
                    'body'  => "Design, fabrication, installation and teardown, with attention to the things that decide whether a stand works: sightlines from the aisle, where conversations can actually happen, how the graphics read at ten metres versus one. For brands doing a circuit of shows we build modular so the same investment travels rather than being scrapped after one event.",
                ],
                [
                    'title' => 'Live Shows & Production',
                    'lead'  => "Concerts, performances and live formats — artist coordination, technical production, permissions and crowd flow.",
                    'body'  => "The visible half is staging, sound, lighting and the show itself. The half that decides whether it goes well is the rest: licences and permissions, vendor scheduling, crowd movement, contingency for weather and for the thing nobody planned for. We are on ground from setup through teardown with one point of contact, so problems get absorbed rather than escalated to you mid-event.",
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
                    People will forget what you said.<br>
                    They will never forget how you made them feel.
                </p>
            </div>
        </div>
    </section>

    {{-- ====================== FAQ ====================== --}}
    {{--
        <details>/<summary> rather than a JS accordion: the answers stay in the DOM
        and remain crawlable whether or not the panel is open, and it works with
        no script at all. $evFaqs is defined in @section('head') so the same array
        feeds the FAQPage schema -- copy and markup cannot drift apart.
    --}}
    <section class="bg-white py-20" id="ev-faq">
        <div class="mx-auto max-w-[900px] px-5">
            <div class="mb-12 text-center">
                <p class="m-0 mb-3 text-[11px] font-bold uppercase tracking-[3px] text-film-red">Common Questions</p>
                <h2 class="m-0 text-[42px] font-bold leading-[1.15] text-black max-[575px]:text-[30px]">
                    Events & Live FAQs
                </h2>
            </div>

            @foreach($evFaqs as $faq)
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
                <h4 class="m-0 mb-[10px] text-[38px] font-normal text-[#666] max-[575px]:text-[26px]">Plan. Build. Run.</h4>
                <h2 class="m-0 text-[42px] font-bold text-black max-[575px]:text-[32px]">Moments Worth Showing Up For</h2>
            </div>
            <p class="mx-auto m-0 max-w-[900px] text-center text-[18px] leading-[1.8] text-[#666]">
                An event is a few hours that costs more than a quarter of media. What makes it worth it is
                everything around the few hours — the idea people remember, the build that looks like your
                brand, and the footage that keeps earning attention long after the room has emptied.
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
